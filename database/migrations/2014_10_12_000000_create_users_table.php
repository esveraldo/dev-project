<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('typeuser')->default('2');
            $table->string('name');
            $table->string('avatar')->default(env("APP_URL").'/images/avatar/placeholder300x300.jpg');
            $table->string('email')->unique();
            $table->tinyInteger('age')->default(39);
            $table->string('password')->default(bcrypt('mandrake'));
            $table->string('cpf')->unique();
            $table->string('ssn')->nullable()->default('SSN');
            $table->char('gender');
            $table->string('platform');
            $table->string('ddd', 5)->default('021')->nullable();
            $table->string('phone', 15);
            $table->string('address');
            $table->string('number', 10)->default('1435');
            $table->string('complement');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}