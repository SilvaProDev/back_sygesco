<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneeScolairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annee_scolaires', function (Blueprint $table) {
            $table->id();
            $table->Integer("debut_annee");
            $table->Integer("fin_annee");
            $table->date("date_debut");
            $table->date("date_fin");
            $table->integer("encours")->nullable()->default('0');
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
        Schema::dropIfExists('annee_scolaires');
    }
}
