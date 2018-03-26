<?php

use Illuminate\Database\Seeder;

use App\Models\Encarte;
use App\Models\Product;

class EncartesTableSeeder extends Seeder
{
    public function run()
    {
        foreach(Product::all() as $key => $product)
        {
            Encarte::create(array(
                'product_id'        => $product->id,
                'type'              => 'Varejo',
                'unit'              => rand(10, 90),
                'price'             => $product->price - ($product->price * 20 / 100),
                'info'              => $product->info,
                'status'            => '1',
            ));
        }
    }
}
