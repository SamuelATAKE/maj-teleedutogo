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
            $table->string('type');
            $table->string('examen')->nullable();
            $table->string('etablissement')->nullable();
            $table->string('annee')->nullable();
            $table->string('chapitre')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('contributeur_id')->nullable();
            $table->unsignedBigInteger('matiere_id');
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
