<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigLivretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_livrets', function (Blueprint $table) {
            $table->id();
            $table->string("libelle");
            $table->BigInteger("livret_id")->unsigned();



            $table->foreign("livret_id")
            ->references("id")
            ->on("livrets")
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
        Schema::dropIfExists('config_livrets');
    }
}
