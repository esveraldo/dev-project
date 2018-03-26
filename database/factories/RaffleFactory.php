<?php

$factory->define(App\Models\Raffle::class, function (Faker\Generator $faker) {
    return [
        'user_id'       => $faker->numberBetween(1, 33),
        'name'          => $faker->randomElement($array = array ('TV 55', 'Bicicleta', 'VW Fox', 'Freezer', 'Geladeira', 'Viagem', 'Notebook', 'PC')),
        'midias'        => $faker->randomElement($array = array ('Youtube', 'Produção propria')),
        'categories'    => $faker->randomElement($array = array ('Participante', 'Dono')),
        'value'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 7),
        'description'   => $faker->text(20),
        'type_raffle'   => $faker->numberBetween(1, 2),
        'details_type'  => $faker->sentence(6),
    ];
});


