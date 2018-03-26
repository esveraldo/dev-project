<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class OfferUserTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Offer::all() as $offer)
        {
            DB::table('offer_user')->insert(
                [
                    'user_id' => mt_rand(1, 2),
                    'offer_id' => $offer->id,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }
    }
}
