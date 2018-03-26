<?php

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class ProductStoreTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Store::all() as $store) {
            for($x = 1; $x <= 9; $x++){
                DB::table('product_store')->insert(['store_id' => $store->id, 'product_id' =>$x]);
            }
        }
    }
}
