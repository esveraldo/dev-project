<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaProductTable extends Migration
{
    public function up()
    {
        Schema::create('lista_product', function (Blueprint $table) {
            $table->integer('lista_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->foreign('lista_id')
                ->references('id')->on('lists')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lista_product');
    }
}
