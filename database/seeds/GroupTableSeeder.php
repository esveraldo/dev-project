<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    public function run()
    {
        Group::create(array(
            'id'            => '1',
            'name'          => 'Suprimentos',
            'status'        => '1',
            'category_id'   => '3',
        ));

        Group::create(array(
            'id'            => '2',
            'name'          => 'Material de Escritório',
            'status'        => '1',
            'category_id'   => '2',
        ));

        Group::create(array(
            'id'            => '3',
            'name'          => 'Material Escolar',
            'status'        => '1',
            'category_id'   => '2',
        ));

        Group::create(array(
            'id'            => '4',
            'name'          => 'Higiene',
            'status'        => '1',
            'category_id'   => '4',
        ));

        Group::create(array(
            'id'            => '5',
            'name'          => 'Energia',
            'status'        => '1',
            'category_id'   => '1',
        ));

        Group::create(array(
            'id'            => '6',
            'name'          => 'Multiuso',
            'status'        => '1',
            'category_id'   => '4',
        ));

        //factory(App\Models\Group::class, 10)->create();
    }
}
