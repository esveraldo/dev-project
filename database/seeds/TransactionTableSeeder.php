<?php

use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    public function run()
    {
        $max = TransactionType::all()->count();
        foreach (User::all() as $user){
            for($x=1;$x<=rand(2, $max);$x++){
                Transaction::create(array(
                    'points'                => rand(1, 50),
                    'user_id'               => $user->id,
                    'transaction_type_id'   => rand(1, $max),
                    'description'           => TransactionType::find($x)->description
                ));
            }
        }
    }
}
