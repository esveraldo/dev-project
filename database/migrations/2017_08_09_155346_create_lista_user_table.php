<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaUserTable extends Migration
{
    public function up()
    {
        Schema::create('lista_user', function (Blueprint $table) {
            $table->integer('lista_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('lista_id')
                ->references('id')->on('lists')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lista_user');
    }
}
