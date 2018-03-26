<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferCampaign extends Model
{
    protected $fillable = ['offer_id', 'campaign_id'];

    protected $table = 'offer_campaigns';
}
