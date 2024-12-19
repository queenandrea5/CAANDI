<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo'];

    public function enclosures()
    {
        return $this->belongsToMany(Enclosure::class, 'relation_enclos_animals', 'id_animal', 'id_enclos');
    }
}

