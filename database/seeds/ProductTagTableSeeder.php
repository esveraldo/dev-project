<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTagTableSeeder extends Seeder
{
    public function run()
    {

        for($x = 1; $x <= 9; $x++){
            DB::table('product_tag')->insert([
                'product_id' => $x, 'tag_id' => random_int(1,10)
            ]);
            DB::table('product_tag')->insert([
                'product_id' => $x, 'tag_id' => random_int(1,10)
            ]);
        }

    }
}
