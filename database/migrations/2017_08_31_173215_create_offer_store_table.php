<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferStoreTable extends Migration
{
    public function up()
    {
        Schema::create('offer_store', function (Blueprint $table) {
            $table->integer('offer_id')->unsigned();
            $table->integer('store_id')->unsigned();

            $table->foreign('offer_id')
                ->references('id')->on('offers')
                ->onDelete('cascade');

            $table->foreign('store_id')
                ->references('id')->on('stores')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('offer_store');
    }
}
