<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->BigInteger("trimestre_id")->unsigned();
            $table->BigInteger("annee_id")->unsigned();
            $table->BigInteger("classe_id")->unsigned();
            $table->BigInteger("niveau_id")->unsigned();
            $table->BigInteger("matiere_id")->unsigned();
            $table->BigInteger("teacher_id")->unsigned();



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
            
            $table->foreign("teacher_id")
            ->references("id")
            ->on("users")
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
        Schema::dropIfExists('affectations');
    }
}
