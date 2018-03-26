<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path_image')->default(env('APP_URL').'/images/categories/placeholder300x300.jpg');
            $table->string('name',45);
            $table->softDeletes();
        });
    }

   public function down()
    {
        Schema::dropIfExists('categories');
    }
}