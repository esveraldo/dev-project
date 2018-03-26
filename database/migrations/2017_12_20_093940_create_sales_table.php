<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id');
            $table->integer('order_id');
            $table->dateTime('date');
            $table->string('client_cpf');
            $table->string('client_name');
            $table->string('product_barcode');
            $table->integer('product_quantity');
            $table->integer('order_quantity');
            $table->float('order_total', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
