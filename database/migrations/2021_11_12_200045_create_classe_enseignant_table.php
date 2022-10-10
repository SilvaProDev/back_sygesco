<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseEnseignantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_enseignant', function (Blueprint $table) {
            $table->id();

            $table->BigInteger('classe_id')->unsigned();
            $table->foreign('classe_id')
                    ->references('id')
                    ->on('classes')
                    ->onDelete('cascade'); 
    
            $table->BigInteger('enseignant_id')->unsigned();
            $table->foreign('enseignant_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade'); 

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
        Schema::dropIfExists('classe_enseignant');
    }
}
