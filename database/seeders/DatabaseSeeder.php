<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biome;
use App\Models\Enclosure;
use App\Models\Animal;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Créer un biome
        $biome = Biome::create([
            'name' => 'Savane',
            'color' => '#FFD700',
        ]);

        // Créer un enclos pour ce biome
        $enclosure = Enclosure::create([
            'biome_id' => $biome->id,
            'meal' => 'Herbivore',
        ]);

        // Ajouter des animaux dans cet enclos
        Animal::create(['enclosure_id' => $enclosure->id, 'name' => 'Lion']);
        Animal::create(['enclosure_id' => $enclosure->id, 'name' => 'Zèbre']);
        Animal::create(['enclosure_id' => $enclosure->id, 'name' => 'Éléphant']);
    }
}

