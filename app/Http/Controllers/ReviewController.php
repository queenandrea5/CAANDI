<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Ajouter un avis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_enclosure' => 'required|exists:enclosures,id',
            'user_name' => 'required|string|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::create($validated);

        return response()->json(['message' => 'Review added successfully', 'review' => $review], 201);
    }

    // Récupérer tous les avis pour un enclos
    public function index($id_enclosure)
    {
        $reviews = Review::where('id_enclosure', $id_enclosure)->get();

        return response()->json($reviews);
    }
}

