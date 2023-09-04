<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant', function (Blueprint $table) {
            $table->id();
            $table-> longText("nom");
            $table-> longText("prenom");
            $table-> longText("hobbies");
            $table-> longText("specialite");
            $table-> longText("nationalite");
            $table-> longText("description");
            $table->string("picture");
            $table->boolean('active')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiant');
    }
}
