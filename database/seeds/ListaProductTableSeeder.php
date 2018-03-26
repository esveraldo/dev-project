<?php

use App\Models\Lista;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ListaProductTableSeeder extends Seeder
{
    public function run()
    {
        for($x = 0; $x <= 250; $x++){
            DB::table('lista_product')->insert([
                'lista_id' => random_int(1, Lista::all()->count()), 'product_id' => random_int(1,9)
            ]);
        }

        DB::table('lista_product')->insert([
            'lista_id' => 10,
            'product_id' => 1
        ]);


        $lista = Lista::create(['name' => 'Volta às Aulas - Escola Homa', 'token' => str_random(45), 'status' => 1, 'cacula' => 1]);

        DB::table('admin_lista')->insert([
            'lista_id' => $lista->id,
            'admin_id' => 1
        ]);

        DB::table('lista_product')->insert([
            'lista_id' => $lista->id,
            'product_id' => 4
        ]);

        DB::table('lista_product')->insert([
            'lista_id' => $lista->id,
            'product_id' => 5
        ]);

        DB::table('lista_product')->insert([
            'lista_id' => $lista->id,
            'product_id' => 6
        ]);

        for($x=1;$x<=User::all()->count();$x = $x+2){

            DB::table('lista_user')->insert([
                'lista_id' => $lista->id,
                'user_id' => $x
            ]);

        }
    }
}
