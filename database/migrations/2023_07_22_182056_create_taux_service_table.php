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
        Schema::create('taux_service', function (Blueprint $table) {
            $table->unsignedBigInteger('indicateur_id');
            $table->unsignedBigInteger('service_id');

            $table->foreign('indicateur_id')->references('id_indicateur')->on('tauxes');
            $table->foreign('service_id')->references('id_service')->on('services');

            // Ajoutez d'autres colonnes si nécessaire pour stocker des informations supplémentaires.


            $table->primary(['indicateur_id', 'service_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taux_service');
    }
};
