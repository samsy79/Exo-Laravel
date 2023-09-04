<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string("cours")->nullable();
            $table->bigInteger('phone');
            $table->longText('adresse');
            $table->string('email')->unique();
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
        Schema::dropIfExists('enseignant');
    }
}
