<?php

use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Banner::class, 5)->create();
    }
}
