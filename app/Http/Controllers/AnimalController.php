<?php
namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function search($name)
    {
        $animal = Animal::with('enclosures.biome')->where('name', 'LIKE', "%$name%")->first();

        if (!$animal) {
            return response()->json(['message' => 'Animal not found'], 404);
        }

        return response()->json([
            'id' => $animal->id,
            'name' => $animal->name,
            'photo' => $animal->photo,
            'enclosures' => $animal->enclosures->map(function ($enclosure) {
                return [
                    'id' => $enclosure->id,
                    'meal' => $enclosure->meal,
                    'biome' => $enclosure->biome->name,
                ];
            }),
        ]);
    }


    public function getAnimals(Request $request)
    {
        $enclosureId = $request->query('enclosure_id');

        // Vérifie si un `enclosure_id` est fourni
        if ($enclosureId) {
            $animals = Animal::with('enclosures.biome')
                ->whereHas('enclosures', function ($query) use ($enclosureId) {
                    $query->where('id', $enclosureId);
                })
                ->get();
        } else {
            // Récupère tous les animaux avec leurs enclos et biomes
            $animals = Animal::with('enclosures.biome')->get();
        }

        // Vérifie si des animaux sont trouvés
        if ($animals->isEmpty()) {
            return response()->json(['message' => 'Aucun animal trouvé'], 404);
        }

        // Formatage de la réponse
        return response()->json($animals->map(function ($animal) {
            return [
                'id' => $animal->id,
                'name' => $animal->name,
                'photo' => $animal->photo,
                'enclosures' => $animal->enclosures->map(function ($enclosure) {
                    return [
                        'id' => $enclosure->id,
                        'meal' => $enclosure->meal,
                        'biome' => $enclosure->biome->name,
                    ];
                }),
            ];
        }));
    }
}

