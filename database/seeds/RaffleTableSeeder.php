<?php

use Illuminate\Database\Seeder;
use App\Models\Raffle;

class RaffleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Raffle::create(array(
        'user_id'       => '1',
        'name'          => 'Frigobar',
        'midias'        => 'Youtube',
        'categories'    => 'Eletrodomesticos',
        'value'         => 1700.00,
        'description'   => 'Frigobar com pouco uso',
        'type_raffle'   => '1',
        'details_type'  => 'Limitado',
        ));
        
        Raffle::create(array(
        'user_id'       => '5',
        'name'          => 'GM Monza',
        'midias'        => 'Youtube',
        'categories'    => 'Automoveis',
        'value'         => 1700.00,
        'description'   => '4 pneus novos',
        'type_raffle'   => '2',
        'details_type'  => 'Ilimitado',
        ));
        
        Raffle::create(array(
        'user_id'       => '11',
        'name'          => 'Barraca de camping',
        'midias'        => 'Youtube',
        'categories'    => 'Lazer',
        'value'         => 1700.00,
        'description'   => 'Seminova',
        'type_raffle'   => '2',
        'details_type'  => 'Ilimitado',
        ));
        
        factory(App\Models\Raffle::class, 300)->create();
    }
}
