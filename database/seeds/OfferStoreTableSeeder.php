<?php

use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class OfferStoreTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Offer::all() as $offer) {
            foreach (Store::all() as $store) {
                DB::table('offer_store')->insert(['offer_id' => $offer->id, 'store_id' =>$store->id]);
            }
        }
        DB::table('offer_store')->where(['offer_id' => 2, 'store_id' => 4])->delete();
        DB::table('offer_store')->where(['offer_id' => 4, 'store_id' => 4])->delete();
        DB::table('offer_store')->where(['offer_id' => 5, 'store_id' => 4])->delete();
        DB::table('offer_store')->where(['offer_id' => 6, 'store_id' => 4])->delete();
        DB::table('offer_store')->where(['offer_id' => 7, 'store_id' => 4])->delete();

        DB::table('offer_store')->where(['offer_id' => 1, 'store_id' => 2])->delete();
        DB::table('offer_store')->where(['offer_id' => 2, 'store_id' => 2])->delete();
        DB::table('offer_store')->where(['offer_id' => 3, 'store_id' => 2])->delete();
        DB::table('offer_store')->where(['offer_id' => 8, 'store_id' => 2])->delete();
        DB::table('offer_store')->where(['offer_id' => 9, 'store_id' => 2])->delete();
    }
}
