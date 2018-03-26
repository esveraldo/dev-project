<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        Admin::create(array(
            'name'       => 'Six Creative Admin',
            'email'      => 'admin@sixcreative.com.br',
            'password'   => bcrypt('admin6'),
        ));

        Admin::create(array(
            'name'       => 'Six Creative Marketing',
            'email'      => 'marketing@sixcreative.com.br',
            'password'   => bcrypt('admin6'),
        ));

        Admin::create(array(
            'name'       => 'Six Creative Sales',
            'email'      => 'sales@sixcreative.com.br',
            'password'   => bcrypt('admin6'),
        ));

        Admin::create(array(
            'name'       => 'Six Creative TI',
            'email'      => 'ti@sixcreative.com.br',
            'password'   => bcrypt('admin6'),
        ));
    }
}
