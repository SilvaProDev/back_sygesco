<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_mails', function (Blueprint $table) {
            $table->id();
            $table->integer("annee_id");
            $table->integer("niveau_id");
            $table->integer("classe_id");
            $table->BigInteger("student_id");
            $table->string("fichier")->default('vide');
            $table->date("date");
            $table->string("sujet");
            $table->text("message");
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
        Schema::dropIfExists('send_mails');
    }
}
