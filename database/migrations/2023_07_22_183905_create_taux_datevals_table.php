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
        Schema::create('taux_datevals', function (Blueprint $table) {
            $table->unsignedBigInteger('indicateur_id');
            $table->unsignedBigInteger('date_id');

           $table->foreign('indicateur_id')->references('id_indicateur')->on('tauxes');
           $table->foreign('date_id')->references('id_date')->on('datevals');

            // Ajoutez d'autres colonnes si nécessaire pour stocker des informations supplémentaires.
             
            $table->float('numerateur',10,4);
            $table->float('denominateur',10,4);
            $table->float('valeur');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taux_datevals');
    }
};
