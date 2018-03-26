<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['name' => 'full_access', 'description' => 'Has access to all Admin System.'],
            ['name' => 'marketing_access', 'description' => 'Has access to marketing dashboard.'],
            ['name' => 'sales_access', 'description' => 'Has access to sales dashboard.'],
            ['name' => 'ti_access', 'description' => 'Has access to TI dashboard.'],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
