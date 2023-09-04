<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('cours', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->integer('coef');
        $table->integer('masse_horaire');
        $table->foreignId('categorie_id')
                  ->nullable()
                  ->constrained('categories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->references('id')->on('categories');
                  $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('user')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('cours');
    }
}
