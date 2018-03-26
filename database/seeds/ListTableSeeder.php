<?php

use Illuminate\Database\Seeder;

class ListTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Lista::class, 100)->create();
    }
}
