<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {

        User::create(array(
            //'typeuser'      => '2',
            'name'          => 'Silva',
            'email'         => 'silva@user.com',
            'password'      => bcrypt('mandrake'),
            'cpf'           => '133.789.284-15',
            'gender'        => 'M',
            'platform'     => 'Android',
            'age'           => 30,
            'ddd'           => '21',
            'phone'         => '3234-1234',
            'address'       => 'Rua Das Camélias',
            'number'        => '16',
            'complement'    => 'Ap 201',
            'neighborhood'  => 'Valqueire',
            'city'          => 'Rio de Janeiro',
            'state'         => 'RJ',
            'country'       => 'Brasil',
        ));

        User::create(array(
            //'typeuser'      => '2',
            'name'          => 'Maria',
            'email'         => 'maria@user.com',
            'password'      => bcrypt('mandrake'),
            'cpf'           => '000.789.284-15',
            'gender'        => 'F',
            'platform'     => 'Android',
            'age'           => 30,
            'ddd'           => '21',
            'phone'         => '3425-0909',
            'address'       => 'Rua Das Rosas',
            'number'        => '16',
            'complement'    => 'Sobrado',
            'neighborhood'  => 'Vila Isabel',
            'city'          => 'Rio de Janeiro',
            'state'         => 'RJ',
            'country'       => 'Brasil',
        ));

        User::create(array(
            //'typeuser'      => '2',
            'name'          => 'David',
            'email'         => 'david@user.com',
            'password'      => bcrypt('mandrake'),
            'cpf'           => '122.345.234-15',
            'gender'        => 'M',
            'platform'     => 'Ios',
            'age'           => 30,
            'ddd'           => '21',
            'phone'         => '3570-9500',
            'address'       => 'Rua Das Flores',
            'number'        => '1025',
            'complement'    => 'casa',
            'neighborhood'  => 'Barra da Tijuca',
            'city'          => 'Rio de Janeiro',
            'state'         => 'RJ',
            'country'       => 'Brasil',
        ));

        factory(App\Models\User::class, 30)->create();
    }
}
