<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('states')->nullable();
            $table->string('cities')->nullable();
            $table->string('neighborhoods')->nullable();
            $table->string('stores')->nullable();
            $table->string('platforms')->nullable();
            $table->string('genders')->nullable();
            $table->string('lists')->nullable();
            $table->string('ages')->nullable();
            $table->string('products')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
