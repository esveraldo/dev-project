<?php

use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Seeder;

class UserStoreTableSeeder extends Seeder
{
    public function run()
    {
        for($x = 0; $x <= 50; $x++){
            DB::table('store_user')->insert(['store_id' => random_int(1, Store::all()->count()), 'user_id' => random_int(1, User::all()->count())]);
        }
    }
}
