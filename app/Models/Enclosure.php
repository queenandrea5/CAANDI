<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    use HasFactory;

    protected $fillable = ['id_biomes', 'meal'];

    public function biome()
    {
        return $this->belongsTo(Biome::class, 'id_biomes');
    }

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'relation_enclos_animals', 'id_enclos', 'id_animal');
    }

    public function reviews()
{
    return $this->hasMany(Review::class, 'id_enclosure');
}

}



