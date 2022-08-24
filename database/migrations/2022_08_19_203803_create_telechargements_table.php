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
        Schema::create('telechargements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ressource_id');
            $table->unsignedBigInteger('utilisateur_id');
            $table->date('date_telechargement');
            $table->timestamps();

            $table->foreign('ressource_id')->references('id')->on('ressources');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telechargements');
    }
};
