<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Don;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use MeSomb\Operation\PaymentOperation;
use Illuminate\CsrfTokenMismatchException;

class DonController extends Controller
{
    public function dons()
    {
        return view('dons');
    }

    public function store(Request $request)
    {
        try {
            // Sépare country_currency en pays et devise
            [$country, $currency] = explode('|', $request->input('country_currency'));

            // Validation
            $validator = Validator::make($request->all(), [
                'nature' => 'required|in:Financier',
                'country_currency' => 'required|string',
                'phone' => 'required|string|max:20',
                'amount' => 'required|numeric|min:5',
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'service' => 'required|in:ORANGE,MTN',
            ]);

            if ($validator->fails()) {
                Log::error('Validation échouée :', $validator->errors()->toArray());
                return redirect()->route('dons')->withErrors($validator)->withInput();
            }

            // Paiement via MeSomb
            $operation = new PaymentOperation(
                env('MESOMB_APPLICATION_KEY'),
                env('MESOMB_ACCESS_KEY'),
                env('MESOMB_SECRET_KEY')
            );

            $phone = preg_replace('/^\+\d{1,3}/', '', $request->phone); // Supprime le préfixe
            $result = $operation->makeCollect([
                "amount" => (int) $request->amount,
                "payer" => $phone,
                "service" => $request->service,
                "currency" => $currency,
                "country" => $country,
                "reference" => uniqid('don_'), // Identifiant unique
            ]);

            Log::info('Réponse MeSomb :', (array) $result);

            // Vérification du statut du paiement
            if (!$result->success) {
                $errorMessage = $result->message ?? 'Le paiement a été annulé ou a échoué.';
                if (isset($result->status) && $result->status === 'CANCELLED') {
                    return redirect()->route('dons')
                        ->withErrors(['general' => 'Vous avez annulé le paiement. Veuillez réessayer si nécessaire.'])
                        ->withInput();
                }
                // Traduire les messages d'erreur MeSomb courants
                $translatedMessage = $this->translateMeSombError($errorMessage);
                return redirect()->route('dons')
                    ->withErrors(['general' => 'Échec du paiement : ' . $translatedMessage])
                    ->withInput();
            }

            // Enregistrement du don
            Don::create([
                'nature' => $request->nature,
                'country_code' => $country,
                'currency_code' => $currency,
                'phone' => $request->phone,
                'montant' => $request->amount,
                'donateur' => $request->name,
                'email' => $request->email,
                'service' => $request->service,
                'statut' => 'completed',
                'date_don' => now(),
            ]);

            Log::info('Don enregistré avec succès');
            return redirect()->route('dons')->with('success', '🎉 Votre don a été payé et enregistré avec succès !');
        } catch (CsrfTokenMismatchException $e) {
            Log::error('Erreur de jeton CSRF :', ['message' => $e->getMessage()]);
            return redirect()->route('dons')
                ->withErrors(['general' => 'Votre session a expiré. Veuillez rafraîchir la page et réessayer.'])
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors du traitement du don :', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            // Traduire ou personnaliser le message d'erreur
            $errorMessage = $this->translateGeneralError($e->getMessage());
            return redirect()->route('dons')
                ->withErrors(['general' => 'Erreur lors du traitement du don : ' . $errorMessage])
                ->withInput();
        }
    }

    /**
     * Traduit les messages d'erreur MeSomb en français.
     *
     * @param string $errorMessage
     * @return string
     */
    private function translateMeSombError($errorMessage)
    {
        $translations = [
            'Error during the processing' => 'Erreur lors du traitement du paiement.',
            'Invalid phone number' => 'Numéro de téléphone invalide.',
            'Insufficient funds' => 'Fonds insuffisants.',
            'Transaction cancelled' => 'Transaction annulée par l\'utilisateur.',
            'Service unavailable' => 'Service indisponible, veuillez réessayer plus tard.',
        ];

        return $translations[$errorMessage] ?? $errorMessage;
    }

    /**
     * Traduit les messages d'erreur généraux en français.
     *
     * @param string $errorMessage
     * @return string
     */
    private function translateGeneralError($errorMessage)
    {
        $translations = [
            'Error during the processing' => 'Erreur lors du traitement du don.',
            'Database error' => 'Erreur de base de données.',
            'Connection timeout' => 'Délai de connexion dépassé.',
        ];

        return $translations[$errorMessage] ?? 'Une erreur inattendue s\'est produite.';
    }
}