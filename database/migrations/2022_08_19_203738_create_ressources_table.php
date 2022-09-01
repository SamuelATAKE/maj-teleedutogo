<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('nom_ressource');
            $table->unsignedBigInteger('contributeur_id');
            $table->unsignedBigInteger('matiere_id');
            $table->string('type');
            $table->string('examen')->nullable();
            $table->string('etablissement')->nullable();
            $table->string('annee')->nullable();
            $table->string('chapitre')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            // $table->foreign('contributeur_id')->references('id')->on('users');
            // $table->foreign('matiere_id')->references('id')->on('matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ressources');
    }
};
