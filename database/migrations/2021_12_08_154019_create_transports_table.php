<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->integer("niveau_id");
            $table->string("paye_par_annee");
            $table->integer("classe_id");        
            $table->integer("montant");
           

            $table->BigInteger("student_id")->unsigned();
            $table->foreign("student_id")
                ->references("id")
                ->on("students")
                ->onDelete("cascade");
            
            $table->BigInteger("trimestre_id")->unsigned();
            $table->foreign("trimestre_id")
            ->references("id")
            ->on("semestres")
            ->onDelete("cascade");

            $table->BigInteger("annee_id")->unsigned();
            $table->foreign("annee_id")
            ->references("id")
            ->on("annee_scolaires")
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
        Schema::dropIfExists('transports');
    }
}
