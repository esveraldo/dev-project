<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferUserTable extends Migration
{
    public function up()
    {
        Schema::create('offer_user', function (Blueprint $table) {
            $table->integer('offer_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('status')->default(1);

            $table->foreign('offer_id')
                ->references('id')->on('offers')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offer_user');
    }
}
