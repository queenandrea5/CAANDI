<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['id_enclosure', 'user_name', 'comment', 'rating'];

    // Relation avec l'enclos
    public function enclosure()
    {
        return $this->belongsTo(Enclosure::class, 'id_enclosure');
    }
}

