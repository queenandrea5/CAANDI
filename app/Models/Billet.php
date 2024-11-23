<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class Billet extends Model
{
    use HasFactory;

    protected $fillable = ['nom_client', 'age', 'prix', 'date_visite'];

    /**
     * Calculer le prix en fonction de l'âge.
     */
    public static function calculerPrix($age)
    {
        if ($age <= 12) {
            return 10.00; // Enfant
        } elseif ($age <= 64) {
            return 20.00; // Adulte
        } else {
            return 15.00; // Senior
        }
    }
}


