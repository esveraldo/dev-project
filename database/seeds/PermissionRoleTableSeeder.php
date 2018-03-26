<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        // $pr = Permission and role
        $pr = [
            // VICTOR - BUGFIX - Create a full acess permission
            // role 1 = Master Admin
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],


            ['permission_id' => 2, 'role_id' => 2],
            ['permission_id' => 3, 'role_id' => 3],
            ['permission_id' => 4, 'role_id' => 4],
        ];

        DB::table('permission_role')->insert($pr);
    }
}
