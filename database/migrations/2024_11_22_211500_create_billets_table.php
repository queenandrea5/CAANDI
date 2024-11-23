<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateBilletsTable extends Migration
{
    public function up()
    {
        Schema::create('billets', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client');
            $table->integer('age');
            $table->decimal('prix', 8, 2);
            $table->date('date_visite');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('billets');
    }
}
    
