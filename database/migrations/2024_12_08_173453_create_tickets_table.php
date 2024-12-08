<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');       // Nom de l'acheteur
            $table->integer('age');       // Âge de l'acheteur
            $table->string('category');   // Catégorie (enfant, adulte, senior)
            $table->decimal('price', 8, 2); // Prix du billet
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}

