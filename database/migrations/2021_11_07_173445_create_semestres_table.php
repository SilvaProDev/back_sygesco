<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestres', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('annee_id')->unsigned();
            $table->string("libelle")->unique();
            $table->date("date_debut");
            $table->date("date_fin");
            $table->integer("encours")->default('0')->nullable();

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
        Schema::dropIfExists('semestres');
    }
}
