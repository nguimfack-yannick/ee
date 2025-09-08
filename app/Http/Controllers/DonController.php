<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Branch;      // Pour charger les branches
use App\Models\Donation;    // (Optionnel, si tu veux enregistrer les dons en base)

class DonController extends Controller
{

    public function dons()
    {
        return view('dons'); // resources/views/dons.blade.php
    }


  // /**
  //  * Affiche la page de don avec la liste des branches.
  //  */
  // public function index()
  // {
  //   // Récupération des branches en base
  //   $branches = Branch::all();

  //   return view('dons', compact('branches'));
  // }

  // /**
  //  * Traite le formulaire de don.
  //  */
  // public function store(Request $request)
  // {
  //   // Validation des champs
  //   $request->validate([
  //     'nature' => 'required|string',
  //     'country_currency' => 'required|string',
  //     'phone' => 'required|string',
  //     'amount' => 'nullable|numeric|min:5',
  //     'name' => 'nullable|string|max:255',
  //     'email' => 'nullable|email|max:255',
  //     'branch' => 'required|string',
  //     'service' => 'nullable|string',
  //     'comment' => 'nullable|string|max:500',
  //   ]);

  //   try {
  //     // (Optionnel) Sauvegarder le don en base
  //     // Assure-toi d’avoir une table `donations` et un modèle `Donation`
  //     /*
  //           Donation::create([
  //               'nature' => $request->nature,
  //               'country_currency' => $request->country_currency,
  //               'phone' => $request->phone,
  //               'amount' => $request->amount,
  //               'name' => $request->name,
  //               'email' => $request->email,
  //               'branch' => $request->branch,
  //               'service' => $request->service,
  //               'comment' => $request->comment,
  //           ]);
  //           */

  //     // Retour avec message succès
  //     return redirect()->back()->with('success', 'Merci ! Votre don a été soumis avec succès.');
  //   } catch (\Exception $e) {
  //     // En cas d’erreur
  //     return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
  //   }
  // }
}