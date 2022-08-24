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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nom_role');
            $table->unsignedBigInteger('utilisateur_id')->nullable();
            $table->unsignedBigInteger('classe_id')->nullable();
            $table->unsignedBigInteger('matiere_id')->nullable();
            $table->longText('etablissement_scolaire')->nullable();
            $table->longText('region');
            $table->timestamps();

            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('matiere_id')->references('id')->on('matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
