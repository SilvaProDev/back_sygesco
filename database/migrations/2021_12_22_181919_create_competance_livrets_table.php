<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetanceLivretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competance_livrets', function (Blueprint $table) {
            $table->id();
            $table->BigInteger("trimestre_id")->unsigned();
            $table->BigInteger("annee_id")->unsigned();
            $table->BigInteger("classe_id")->unsigned();
            $table->BigInteger("niveau_id")->unsigned();
            $table->BigInteger("matiere_id")->unsigned()->nullable();
            $table->BigInteger("eleve_id")->unsigned();
            $table->BigInteger("libelle_id")->unsigned();
            $table->BigInteger("livret_id")->unsigned();
            $table->integer("note");
            $table->date("date");



            $table->foreign("livret_id")
            ->references("id")
            ->on("livrets")
            ->onDelete("cascade");

            $table->foreign("libelle_id")
            ->references("id")
            ->on("config_livrets")
            ->onDelete("cascade");

            $table->foreign("trimestre_id")
            ->references("id")
            ->on("semestres")
            ->onDelete("cascade");

            $table->foreign("annee_id")
            ->references("id")
            ->on("annee_scolaires")
            ->onDelete("cascade");

            $table->foreign("classe_id")
            ->references("id")
            ->on("classes")
            ->onDelete("cascade");

            $table->foreign("niveau_id")
            ->references("id")
            ->on("niveaux")
            ->onDelete("cascade");

            $table->foreign("matiere_id")
            ->references("id")
            ->on("matieres")
            ->onDelete("cascade");
            
            $table->foreign("eleve_id")
            ->references("id")
            ->on("students")
            ->onDelete("cascade");
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
        Schema::dropIfExists('competance_livrets');
    }
}
