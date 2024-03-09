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
        Schema::create('tauxes', function (Blueprint $table) {
            $table->id('id_indicateur');
            $table->text('designation_indice');
         //   $table->float('numérateur',10,4);
        //    $table->float('dénominateur',10,4);
        //    $table->float('valeur');
            

            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('process_id');
            $table->unsignedBigInteger('period_id');
            $table->timestamps();
            $table->foreign('employe_id')->references('id_employe')->on('employes');
            $table->foreign('process_id')->references('id_processus')->on('processuses');
            $table->foreign('period_id')->references('id_periode')->on('periodes');

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::dropIfExists('tauxes');
    }
};
