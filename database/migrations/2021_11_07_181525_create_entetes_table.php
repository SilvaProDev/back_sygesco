<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entetes', function (Blueprint $table) {
            $table->id();
            $table->string("numero");
            $table->string("email");
            $table->string("logo");

            $table->unsignedBigInteger('etablissement_id')->unique();
            $table->foreign('etablissement_id')
                ->references('id')
                ->on('etablissements')
                ->onDelete('cascade')
                ->unique();
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
        Schema::dropIfExists('entetes');
    }
}
