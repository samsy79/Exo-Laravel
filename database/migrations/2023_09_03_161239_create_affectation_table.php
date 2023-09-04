<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('affecter_cours', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('cours_id');
        $table->unsignedBigInteger('enseignant_id');
        $table->unsignedBigInteger('etudiant_id');
        $table->unsignedBigInteger('user_id');
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('user');
        $table->foreign('cours_id')->references('id')->on('cours');
        $table->foreign('enseignant_id')->references('id')->on('enseignants');
        $table->foreign('etudiant_id')->references('id')->on('etudiant');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affectation');
    }
}
