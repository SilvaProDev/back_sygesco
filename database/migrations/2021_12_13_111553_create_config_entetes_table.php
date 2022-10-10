<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigEntetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_entetes', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("contact");
            $table->string("code");
            $table->string("statut");
            $table->string("site");
            $table->string("adresse");
            $table->string("email");
            $table->string("slogan");
            $table->string("photo");
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
        Schema::dropIfExists('config_entetes');
    }
}
