<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_enclosure')->constrained('enclosures')->onDelete('cascade'); // Enclos lié
            $table->string('user_name'); // Nom de l'utilisateur
            $table->text('comment'); // Avis
            $table->integer('rating'); // Note (ex. : de 1 à 5)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
