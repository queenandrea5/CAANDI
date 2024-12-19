<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biome extends Model
{
    use HasFactory;

    protected $fillable = ['color', 'name'];

    public function enclosures()
    {
        return $this->hasMany(Enclosure::class, 'id_biomes');
    }
}

