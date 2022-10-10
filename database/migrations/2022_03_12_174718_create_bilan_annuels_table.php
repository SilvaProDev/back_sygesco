<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilanAnnuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilan_annuels', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->string("niveau");
            $table->Integer("annee");

            $table->mediumInteger("candidat_inscrit");
            $table->mediumInteger("garcon_inscrit");
            $table->mediumInteger("fille_inscrit");

            $table->mediumInteger("candidat_present");
            $table->mediumInteger("garcon_present");
            $table->mediumInteger("fille_present");

            $table->mediumInteger("candidat_absent");
            $table->mediumInteger("garcon_absent");
            $table->mediumInteger("fille_absent");

            $table->mediumInteger("candidat_admis");
            $table->mediumInteger("garcon_admis");
            $table->mediumInteger("fille_admis");

            $table->mediumInteger("taux_candidat");
            $table->mediumInteger("taux_garcon");
            $table->mediumInteger("taux_fille");

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
        Schema::dropIfExists('bilan_annuels');
    }
}
