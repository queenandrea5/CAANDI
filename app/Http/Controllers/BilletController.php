<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilletController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données entrantes
        $validated = $request->validate([
            'nom_client' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'date_visite' => 'required|date|after_or_equal:today',
        ]);

        // Calculer le prix du billet en fonction de l'âge
        $prix = Billet::calculerPrix($validated['age']);

        // Créer le billet
        $billet = Billet::create([
            'nom_client' => $validated['nom_client'],
            'age' => $validated['age'],
            'prix' => $prix,
            'date_visite' => $validated['date_visite'],
        ]);

        return response()->json([
            'message' => 'Billet acheté avec succès.',
            'billet' => $billet,
        ], 201);
    }

    /**
     * Lister tous les billets.
     */
    public function index()
    {
        $billets = Billet::all();
        return response()->json($billets, 200);
    }

    /**
     * Voir un billet spécifique.
     */
    public function show($id)
    {
        $billet = Billet::find($id);

        if (!$billet) {
            return response()->json(['message' => 'Billet introuvable'], 404);
        }

        return response()->json($billet, 200);
    }
}
