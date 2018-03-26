<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('points');
            $table->integer('user_id')->nullable();
            $table->integer('offer_id')->nullable();
            $table->integer('transaction_type_id')->nullable();
            $table->string('description');
            $table->timestamps();

            /*$table->foreign('offer_id')
                ->references('id')->on('offers')
                ->onDelete('cascade');*/

            /*$table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');*/

            /*$table->foreign('transaction_type_id')
                ->references('id')->on('transaction_types')
                ->onDelete('cascade');*/
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
