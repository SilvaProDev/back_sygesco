<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
          //  $table->BigInteger("niveau_id")->unsigned();
            $table->engine = 'InnoDB';
            // $table->string("libelle");
            $table->string("serie")->nullable();
            $table->integer("coefficient");
            $table->integer("statut");
            
            $table->BigInteger("niveau_id")->unsigned();
            $table->foreign("niveau_id")
            ->references("id")
            ->on("niveaux")
            ->onDelete("cascade");

            $table->BigInteger("nouvelle_matiere_id")->unsigned();
            $table->foreign("nouvelle_matiere_id")
            ->references("id")
            ->on("nouvelle_matieres")
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
        Schema::dropIfExists('matieres');
    }
}
