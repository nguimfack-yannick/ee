<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\Branch;      // Pour charger les branches
use App\Models\Donation;    // (Optionnel, si tu veux enregistrer les dons en base)
use App\Models\Don;         // Modèle Don
use Illuminate\Support\Facades\Validator;
use MeSomb\Operation\PaymentOperation;


class DonController extends Controller

{
  
    public function dons()
    {
        return view('dons'); // resources/views/dons.blade.php
    }
    // Enregistre un nouveau don dans la base de données

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
                // Vérifier si l'erreur est liée à l'absence de PIN
                $errorMessage = isset($result->message) ? $result->message : 'Le paiement a échoué';
                if (stripos($errorMessage, 'pin') !== false || stripos($errorMessage, 'authorization') !== false) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Veuillez saisir votre code PIN pour autoriser la transaction.',
                        'details' => $result,
                    ], 400);
                }

                // Autres erreurs de paiement
                return response()->json([
                    'success' => false,
                    'message' => 'Le paiement a échoué : ' . $errorMessage,
                    'details' => $result,
                ], 400);
            }
        } catch (\Exception $e) {
            // Gérer les exceptions spécifiques (ex. : réseau, configuration MeSomb)
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du traitement du paiement : ' . $e->getMessage(),
                'error_code' => $e->getCode(),
            ], 500);
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

        return response()->json([
            'success' => true,
            'message' => 'Votre don a été payé et enregistré avec succès !',
            'don' => $don,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de l\'enregistrement du don : ' . $e->getMessage(),
        ], 500);
    }
}


}