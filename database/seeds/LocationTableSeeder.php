<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Location::class, 30)->create();
    }
}
