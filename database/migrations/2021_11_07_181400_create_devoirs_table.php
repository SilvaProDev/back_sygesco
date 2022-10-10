<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoirs', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("libelle");
           

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
        Schema::dropIfExists('devoirs');
    }
}
