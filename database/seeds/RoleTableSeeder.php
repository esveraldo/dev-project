<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'Administrador Master', 'description' => 'Tem acesso total a todas as áreas do painel de administração.'],
            ['name' => 'Usuário de Marketing', 'description' => 'Tem acesso à área de marketing.'],
            ['name' => 'Usuário de Vendas', 'description' => 'Tem acesso à área de vendas.'],
            ['name' => 'Usuário de TI', 'description' => 'Tem acesso à área TI.'],
        ];

        DB::table('roles')->insert($roles);
    }
}
