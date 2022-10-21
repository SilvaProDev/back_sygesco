<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->BigInteger('annee_id')->unsigned();
            $table->string('name');
            $table->string("phone");
            $table->string("sexe")->nullable();
            $table->string('email')->unique();
            // $table->string('matricule')->nullable();
            $table->integer("actived");
            $table->string("adresse")->nullable();
            $table->string("image")->nullable();
            $table->BigInteger('role_id')->unsigned();
            // $table->timestamps('last_seen')->nullable();
            $table->Integer('is_online')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('annee_id')
                ->references('id')
                ->on('annee_scolaires')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
