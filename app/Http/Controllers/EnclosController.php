<?php

namespace App\Http\Controllers;
use App\Models\Enclosure;
use App\Models\Biome;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnclosController extends Controller
{
    public function getEnclosures($biomeId)
{
    // Récupérer le biome avec ses enclos associés
    $biome = Biome::with('enclosures')->find($biomeId);

    // Vérifier si le biome existe
    if (!$biome) {
        return response()->json(['message' => 'Biome not found'], 404);
    }

    // Retourner les enclos du biome sous forme de JSON
    return response()->json([
        'biome' => $biome->name,
        'color' => $biome->color,
        'enclosures' => $biome->enclosures->map(function ($enclosure) {
            return [
                'id' => $enclosure->id,
                'meal' => $enclosure->meal,  // Assurez-vous que le champ `meal` est bien dans votre table `enclosures`
            ];
        }),
    ]);
}

    
}
