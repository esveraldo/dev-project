<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductGroupTableSeeder extends Seeder
{
    public function run()
    {
        $cp = [
            ['group_id' => 2, 'product_id' => 4],
            ['group_id' => 2, 'product_id' => 5],
            ['group_id' => 2, 'product_id' => 6],
            ['group_id' => 2, 'product_id' => 7],

            ['group_id' => 3, 'product_id' => 4],
            ['group_id' => 3, 'product_id' => 5],

            ['group_id' => 4, 'product_id' => 3],
            ['group_id' => 4, 'product_id' => 9],

            ['group_id' => 6, 'product_id' => 3],

            ['group_id' => 1, 'product_id' => 1],
            ['group_id' => 1, 'product_id' => 8],
            ['group_id' => 2, 'product_id' => 1],
            ['group_id' => 2, 'product_id' => 8],

            ['group_id' => 5, 'product_id' => 2],
            ['group_id' => 1, 'product_id' => 2]
        ];

        DB::table('product_group')->insert($cp);
    }
}
