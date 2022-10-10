<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScolaritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scolarites', function (Blueprint $table) {
            $table->id();
           
            $table->Integer("montant");
            $table->Integer("classe_id");
            $table->Integer("niveau_id");
            $table->timestamp("date")->nullable();

            $table->BigInteger("annee_id")->unsigned();
            $table->foreign("annee_id")
            ->references("id")
            ->on("annee_scolaires")
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
        Schema::dropIfExists('scolarites');
    }
}
