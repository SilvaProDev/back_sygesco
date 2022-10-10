<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("droit");
            $table->string("prenom");
            $table->string("sexe");
            $table->date("date_naissance");
            $table->string("matricule");           
            $table->string("redoublant");
            $table->integer("regime")->nullable();
            $table->string("interime")->nullable();
            $table->string("lieu_naissance");
            $table->integer("scolarite");
            $table->string("oriente");
            $table->string("nationalite");
            $table->string("email");
            $table->string("adresse");
            $table->string("maladie")->nullable();
            $table->string("transport")->nullable();
            $table->string("cantine")->nullable();
            $table->string("photo")->nullable();
            $table->string("nom_pere");
            $table->string("contact_pere");
            $table->string("nom_mere");
            $table->string("contact_mere")->nullable();
            $table->string("nom_tuteur")->nullable();
            $table->string("contact_tuteur")->nullable();
            $table->string("autre")->nullable();

            $table->BigInteger("annee_id")->unsigned();
            $table->foreign("annee_id")
                  ->references("id")
                  ->on("annee_scolaires")
                  ->onDelete("cascade");

            $table->BigInteger("niveau_id")->unsigned();
            $table->foreign("niveau_id")
                  ->references("id")
                  ->on("niveaux")
                  ->onDelete("cascade");
                  
            $table->BigInteger("classe_id")->unsigned();
            $table->foreign("classe_id")
                  ->references("id")
                  ->on("classes")
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
        Schema::dropIfExists('students');
    }
}
