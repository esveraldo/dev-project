<?php

$factory->define(App\Models\Banner::class, function (Faker\Generator $faker) {

    return [
        'name'   => $faker->text(50),
        'path'   => env('APP_URL') . '/images/banners/placeholder300x450.png',
        'type'   => $faker->randomElement($array = array ('catalog', 'offer')),
        'status' => $faker->randomElement([0, 1]),
    ];
});