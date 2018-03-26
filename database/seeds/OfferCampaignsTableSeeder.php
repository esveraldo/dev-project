<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class OfferCampaignsTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Offer::all() as $offer)
        {
            DB::table('offer_campaigns')->insert(
                [
                    'offer_id' => $offer->id,
                    'campaign_id' => 1
                ]
            );
        }
    }
}
