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
}

