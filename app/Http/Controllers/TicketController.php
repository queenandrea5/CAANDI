<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function purchase(Request $request)
    {
        // Validation des données entrantes
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        // Variables pour les catégories et leurs prix
        $priceChild = 10.00; // Prix pour les enfants
        $priceAdult = 20.00; // Prix pour les adultes
        $priceSenior = 15.00; // Prix pour les seniors

        // Déterminer la catégorie en fonction de l'âge
        if ($validated['age'] < 12) {
            $category = 'enfant';
            $price = $priceChild;
        } elseif ($validated['age'] >= 12 && $validated['age'] < 60) {
            $category = 'adulte';
            $price = $priceAdult;
        } else {
            $category = 'senior';
            $price = $priceSenior;
        }

        // Enregistrer l'achat dans la base de données
        $ticket = Ticket::create([
            'name' => $validated['name'],
            'age' => $validated['age'],
            'category' => $category,
            'price' => $price,
        ]);

        // Retourner une réponse JSON
        return response()->json([
            'message' => 'Achat réussi',
            'ticket' => $ticket,
        ], 201);
    }
}

