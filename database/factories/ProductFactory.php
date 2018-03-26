<?php

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\Barcode($faker));

    return [
        'brand_id'    => $faker->randomDigitNotNull,
        'name'        => $faker->name,
        'code'        => $faker->ean13,
        'price'       => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 999),
        'modeofuse'   => $faker->text($maxNbChars = 150),
        'info'        => $faker->text($maxNbChars = 150),
    ];
});