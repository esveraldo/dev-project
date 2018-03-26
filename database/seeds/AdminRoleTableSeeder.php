<?php

use Illuminate\Database\Seeder;

class AdminRoleTableSeeder extends Seeder
{
    public function run()
    {
        // $au = Admin and Role
        $ar = [
            ['admin_id' => 1, 'role_id' => 1],
            ['admin_id' => 2, 'role_id' => 2],
            ['admin_id' => 3, 'role_id' => 3],
            ['admin_id' => 4, 'role_id' => 4],
        ];

        DB::table('admin_role')->insert($ar);
    }
}
