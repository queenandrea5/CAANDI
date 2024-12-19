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
}
