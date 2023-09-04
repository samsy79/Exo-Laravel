<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieCours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->timestamps();
        $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('user')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');


    });
}



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_cours');
    }
}

