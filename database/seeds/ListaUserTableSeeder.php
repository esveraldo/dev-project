<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListaUserTableSeeder extends Seeder
{
    public function run()
    {
        $users = \App\Models\User::all()->count();
        foreach (\App\Models\Lista::all() as $lista)
        {
            DB::table('lista_user')->insert([
                'lista_id' => $lista->id, 'user_id' => random_int(1,$users)
            ]);
        }

        DB::table('lista_user')->insert([
            'lista_id' => 10,
            'user_id' => 1
        ]);
    }
}
