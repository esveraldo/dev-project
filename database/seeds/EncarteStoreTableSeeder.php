<?php

use Illuminate\Database\Seeder;
use App\Models\Encarte;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class EncarteStoreTableSeeder extends Seeder
{

    public function run()
    {
        foreach (Encarte::all() as $encarte) {
            foreach (Store::all() as $store) {
                DB::table('encarte_store')->insert(['encarte_id' => $encarte->id, 'store_id' =>$store->id]);
            }
        }
        DB::table('encarte_store')->where(['encarte_id' => 2, 'store_id' => 4])->delete();
        DB::table('encarte_store')->where(['encarte_id' => 4, 'store_id' => 4])->delete();
        DB::table('encarte_store')->where(['encarte_id' => 5, 'store_id' => 4])->delete();
        DB::table('encarte_store')->where(['encarte_id' => 6, 'store_id' => 4])->delete();
        DB::table('encarte_store')->where(['encarte_id' => 7, 'store_id' => 4])->delete();

        DB::table('encarte_store')->where(['encarte_id' => 1, 'store_id' => 2])->delete();
        DB::table('encarte_store')->where(['encarte_id' => 2, 'store_id' => 2])->delete();
        DB::table('encarte_store')->where(['encarte_id' => 3, 'store_id' => 2])->delete();
        DB::table('encarte_store')->where(['encarte_id' => 8, 'store_id' => 2])->delete();
        DB::table('encarte_store')->where(['encarte_id' => 9, 'store_id' => 2])->delete();
    }
}
