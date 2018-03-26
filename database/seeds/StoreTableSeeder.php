<?php

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    public function run()
    {
        //factory(App\Models\Store::class, 20)->create();

        Store::create(array(
            'name'       => 'Filial Bangu',
            'phone'      => '(21) 4020-0220',
            'address'    => 'Av. Santa Cruz, 4175 – Bangu - RJ',
            'lat'        => '-22.8755694',
            'lng'       => '-43.4628276',
            'open_on'    => '09:00:00',
            'closed_on'  => '19:00:00'
        ));

        Store::create(array(
            'name'       => 'Filial Barra da Tijuca',
            'phone'      => '(21) 4020-0220',
            'address'    => 'Av. Ayrton Senna, 5.500 – Barra da Tijuca - RJ',
            'lat'        => '-22.9643431',
            'lng'       => '-43.355534',
            'open_on'    => '09:00:00',
            'closed_on'  => '19:00:00'
        ));

        Store::create(array(
            'name'       => 'Filial Cabo Frio',
            'phone'      => '(21) 4020-0220',
            'address'    => 'Av. Henrique Terra, 1.700 – Portinho, Cabo Frio – RJ',
            'lat'        => '-22.8730015',
            'lng'       => '-42.0358429',
            'open_on'    => '09:00:00',
            'closed_on'  => '19:00:00'
        ));

        Store::create(array(
            'name'       => 'Filial Centro',
            'phone'      => '(21) 4020-0220',
            'address'    => 'Rua Buenos Aires 261 – Loja – Centro – Rio de Janeiro - RJ',
            'lat'        => '-22.9051913',
            'lng'       => '-43.18447159999999',
            'open_on'    => '09:00:00',
            'closed_on'  => '19:00:00'
        ));

        Store::create(array(
            'name'       => 'Filial Madureira',
            'phone'      => '(21) 4020-0220',
            'address'    => 'Estrada do Portela, 51 – Madureira – Rio de Janeiro - RJ',
            'lat'        => '-22.8732928',
            'lng'       => '-43.3382426',
            'open_on'    => '09:00:00',
            'closed_on'  => '19:00:00'
        ));


    }
}
