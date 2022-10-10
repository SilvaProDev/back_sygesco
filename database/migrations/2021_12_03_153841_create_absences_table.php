<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->timestamp("date");
            $table->string("motif");
            $table->BigInteger("matiere_id");
            
            $table->BigInteger("trimestre_id")->unsigned();
            $table->BigInteger("student_id")->unsigned();
            $table->foreign("student_id")
                ->references("id")
                ->on("students")
                ->onDelete("cascade");

            $table->foreign("trimestre_id")
                ->references("id")
                ->on("semestres")
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
        Schema::dropIfExists('absences');
    }
}
