<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Don;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use MeSomb\Operation\PaymentOperation;

class DonController extends Controller
{
    public function dons()
    {
        return view('dons'); // resources/views/dons.blade.php
    }

    public function store(Request $request)
    {
        // Sépare le champ country_currency en pays et devise
        [$country, $currency] = explode('|', $request->input('country_currency'));

        // Validation des données
        $validator = Validator::make($request->all(), [
            'nature' => 'required|in:Financier,Matériel,Bénévole',
            'country_currency' => 'required|string',
            'phone' => 'required|string|max:20',
            'amount' => 'required_if:nature,Financier|numeric|min:5',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required_if:nature,Financier|in:ORANGE,MTN',
            'comment' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ⚡ Paiement via MeSomb seulement si nature = Financier
        if ($request->nature === 'Financier') {
            try {
                $operation = new PaymentOperation(
                    env('MESOMB_APPLICATION_KEY'),
                    env('MESOMB_ACCESS_KEY'),
                    env('MESOMB_SECRET_KEY')
                );

                $result = $operation->makeCollect([
                    "amount" => (int) $request->amount,
                    "payer" => $request->phone,
                    "service" => $request->service, // ORANGE ou MTN
                    "currency" => $currency,
                    "country" => $country
                ]);

                // Vérifier la réponse
                if (!$result->success) {
                    $errorMessage = isset($result->message) ? $result->message : 'Le paiement a échoué';
                    if (stripos($errorMessage, 'pin') !== false || stripos($errorMessage, 'authorization') !== false) {
                        return redirect()->back()->with('error', 'Veuillez saisir votre code PIN pour autoriser la transaction.')->withInput();
                    }

                    return redirect()->back()->with('error', 'Le paiement a échoué : ' . $errorMessage)->withInput();
                }
            } catch (\Exception $e) {
                // Enregistrer l'erreur complète dans les logs pour le debugging
                Log::error('Erreur MeSomb lors du paiement', [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'stack' => $e->getTraceAsString(),
                    'request' => $request->all()
                ]);

                // Message personnalisé pour l'utilisateur
                $userMessage = 'Désolé, nous n’avons pas pu traiter votre paiement en raison d’un problème technique. Veuillez vérifier votre connexion internet et réessayer dans quelques instants. Pour assistance, contactez-nous à contact@abec-ong.org.';
                
                return redirect()->back()->with('error', $userMessage)->withInput();
            }
        }

        // ✅ Si paiement OK ou don non-financier → enregistre en DB
        try {
            $don = Don::create([
                'nature' => $request->nature,
                'country' => $country,
                'currency' => $currency,
                'phone' => $request->phone,
                'amount' => $request->amount,
                'name' => $request->name,
                'email' => $request->email,
                'service' => $request->service,
                'comment' => $request->comment,
            ]);

            return redirect()->back()->with('success', 'Votre don a été enregistré avec succès ! Merci pour votre générosité.');
        } catch (\Exception $e) {
            // Log l'erreur d'enregistrement
            Log::error('Erreur lors de l’enregistrement du don', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Erreur lors de l’enregistrement du don. Veuillez réessayer ou contacter contact@abec-ong.org.')->withInput();
        }
    }
}