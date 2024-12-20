<?php
namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Enclosure;
class AnimalController extends Controller
{
    public function search($name, $enclosureId)
{
    // Utilisation de 'animals.id' et 'enclosures.id' pour résoudre l'ambiguïté
    $animal = Animal::with('enclosures.biome')
        ->where('animals.name', 'LIKE', "%$name%")
        ->whereExists(function ($query) use ($enclosureId) {
            $query->select(DB::raw(1))
                ->from('enclosures')
                ->join('relation_enclos_animals', 'enclosures.id', '=', 'relation_enclos_animals.id_enclos')
                ->whereRaw('animals.id = relation_enclos_animals.id_animal')
                ->where('enclosures.id', $enclosureId); // Recherche uniquement dans l'enclos spécifié
        })
        ->first();

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


public function searchAnimalsInEnclosure($name, $enclosureId)
{
    // Récupérer l'enclos avec ses animaux associés
    $enclosure = Enclosure::with('animals')->find($enclosureId);

    // Vérifier si l'enclos existe
    if (!$enclosure) {
        return response()->json(['message' => 'Enclos non trouvé'], 404);
    }

    // Filtrer les animaux par leur nom
    $animals = $enclosure->animals->filter(function ($animal) use ($name) {
        return stripos($animal->name, $name) !== false; // Recherche insensible à la casse
    });

    // Vérifier si des animaux ont été trouvés
    if ($animals->isEmpty()) {
        return response()->json(['message' => 'Aucun animal trouvé pour cet enclos avec ce nom'], 404);
    }

    // Formatage de la réponse
    return response()->json($animals->map(function ($animal) {
        return [
            'id' => $animal->id,
            'name' => $animal->name,
            'photo' => $animal->photo,
        ];
    }));
}

    


   // AnimalController.php

public function getAnimals($enclosureId)
{
    // Récupérer l'enclos avec ses animaux associés
    $enclosure = Enclosure::with('animals')->find($enclosureId);

    // Vérifier si l'enclos existe
    if (!$enclosure) {
        return response()->json(['message' => 'Enclos non trouvé'], 404);
    }

    // Formatage de la réponse
    return response()->json($enclosure->animals->map(function ($animal) {
        return [
            'id' => $animal->id,
            'name' => $animal->name,
            'photo' => $animal->photo,
        ];
    }));
}

}

