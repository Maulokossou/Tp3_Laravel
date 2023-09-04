<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursEnseignantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours_enseignant', function (Blueprint $table) {
            $table->unsignedBigInteger('cours_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->timestamps();
            
            $table->primary(['cours_id', 'enseignant_id']);
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cours_enseignant');
    }
}
