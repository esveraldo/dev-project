<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path_image')->default(env("APP_URL").'/images/stores/placeholder300x300.jpg');
            $table->string('name', 45);
            $table->string('phone', 20);
            $table->string('address');
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->time('open_on');
            $table->time('closed_on');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
