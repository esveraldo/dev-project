<?php

use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignsTableSeeder extends Seeder
{
    public function run()
    {
        Campaign::create(array(
            'name'                      => 'Usuários RJ',
            'description'               => 'Usuários que estão na cidade do Rio de Janeiro.',
            'cities'                    => '["Rio de Janeiro"]',
            'ages'                      => '"10,100"',
            'neighborhoods'             => 'null',
            'stores'                    => 'null',
            'states'                    => 'null',
            'platforms'                 => 'null',
            'genders'                   => 'null',
            'lists'                     => 'null',
            'products'                  => 'null',
        ));
    }
}
