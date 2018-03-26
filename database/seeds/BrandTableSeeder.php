<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    public function run()
    {
        Brand::create(array(
            'id'            => '1',
            'name'          => 'HP',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '2',
            'name'          => 'Duracell',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '3',
            'name'          => 'Alklin',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '4',
            'name'          => 'Bic',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '5',
            'name'          => 'Compactor',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '6',
            'name'          => 'Pilot',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '7',
            'name'          => 'Premisse',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '8',
            'name'          => 'Kajoma',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '9',
            'name'          => 'Faber Castell',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '10',
            'name'          => 'Tilibra',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '11',
            'name'          => 'Kit',
            'status'        => '1',
        ));

        Brand::create(array(
            'id'            => '12',
            'name'          => 'Credeal',
            'status'        => '1',
        ));

        //factory(App\Models\Brand::class, 10)->create();
    }
}
