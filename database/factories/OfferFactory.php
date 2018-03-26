<?php

$factory->define(App\Models\Offer::class, function (Faker\Generator $faker) {

    return [
        'product_id' => $faker->unique()->numberBetween($min = 1, $max = 5),
        'type'       => $faker->randomElement($array = array ('Varejo','Atacado','Multi-Atacado', 'Master')),
        'info'       => $faker->text($maxNbChars = 150),
        'unit'       => $faker->randomDigitNotNull,
        'price'      => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 999),
        'status'     => $faker->randomElement([0, 1]),
    ];
});
