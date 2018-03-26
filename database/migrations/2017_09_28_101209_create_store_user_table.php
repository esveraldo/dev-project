<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreUserTable extends Migration
{
    public function up()
    {
        Schema::create('store_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('score')->unsigned()->nullable()->default(0);

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('store_id')
                ->references('id')->on('stores')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_user');
    }
}