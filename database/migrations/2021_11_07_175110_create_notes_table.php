<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
           
            $table->integer("note");
            $table->date("date");
            $table->integer("statut");
          
         

            $table->BigInteger("niveau_id")->unsigned();
            $table->foreign("niveau_id")
                ->references("id")
                ->on("niveaux")
                ->onDelete("cascade");

            $table->BigInteger("matiere_id")->unsigned();
            $table->foreign("matiere_id")
                ->references("id")
                ->on("matieres")
                ->onDelete("cascade");

            $table->BigInteger("trimestre_id")->unsigned();
            $table->foreign("trimestre_id")
                ->references("id")
                ->on("semestres")
                ->onDelete("cascade");

            $table->BigInteger("classe_id")->unsigned();
            $table->foreign("classe_id")
                ->references("id")
                ->on("classes")
                ->onDelete("cascade");

            $table->BigInteger("student_id")->unsigned();
            $table->foreign("student_id")
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
        Schema::dropIfExists('notes');
    }
}
