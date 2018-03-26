<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncarteStoreTable extends Migration
{

    public function up()
    {
        Schema::create('encarte_store', function (Blueprint $table) {
            $table->integer('encarte_id')->unsigned();
            $table->integer('store_id')->unsigned();

            $table->foreign('encarte_id')
                ->references('id')->on('encartes')
                ->onDelete('cascade');

            $table->foreign('store_id')
                ->references('id')->on('stores')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('encarte_store');
    }
}
