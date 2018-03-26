<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Tag::class, 10)->create();
    }
}
