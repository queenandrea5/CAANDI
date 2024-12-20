<?php

namespace App\Http\Controllers;
use App\Models\Biome;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiomeController extends Controller
{
    public function getAllBiomes()
    {
        
        $biomes = Biome::all();

        return response()->json($biomes);
    }

    // BiomeController.php

public function searchBiomes(Request $request)
{
    $query = $request->input('name');
    
    // Assurez-vous que la requête est bien filtrée
    $biomes = Biome::where('name', 'like', '%' . $query . '%')->get();

    return response()->json($biomes);
}

}
