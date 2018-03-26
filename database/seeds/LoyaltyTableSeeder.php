<?php

use App\Models\User;
use App\Models\Loyalty;
use Illuminate\Database\Seeder;

class LoyaltyTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach($users as $user){
            Loyalty::create(['user_id' => $user->id, 'points' => random_int(50, 100), 'last_points' => random_int(0, 49)]);
        }
    }
}
