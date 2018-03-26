<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned()->nullable();
            $table->string('path_image')->default(env("APP_URL").'/images/products/placeholder300x300.jpg');
            $table->string('name');
            $table->string('code');
            $table->integer('rating')->nullable();
            $table->integer('installment')
                ->default(1)
                ->comment('Parcelamento');
            $table->decimal('price', 7, 2);
            $table->string('modeofuse');
            $table->string('info');
            $table->tinyInteger('column')->default(1);
            $table->integer('points')->default(0);

            $table->char('barcode', 13)->default(0);
            $table->string('barcode_path_image')->default(env("APP_URL").'/images/barcodes/placeholder-barcode.jpg');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}