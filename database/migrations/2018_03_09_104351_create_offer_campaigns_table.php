<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferCampaignsTable extends Migration
{
    public function up()
    {
        Schema::create('offer_campaigns', function (Blueprint $table) {
            $table->integer('offer_id')->unsigned();
            $table->integer('campaign_id')->unsigned();

            $table->foreign('offer_id')
                ->references('id')->on('offers')
                ->onDelete('cascade');

            $table->foreign('campaign_id')
                ->references('id')->on('campaigns')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('offer_campaigns');
    }
}
