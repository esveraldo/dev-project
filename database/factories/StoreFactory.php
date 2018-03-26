<?php

$factory->define(App\Models\Store::class, function (Faker\Generator $faker) {

    return [
        'path_image' => env('APP_URL') . '/images/stores/placeholder300x300.jpg',
        'name'       => $faker->name,
        'phone'      => $faker->phoneNumber,
        'address'    => $faker->address,
        'lat'        => $faker->latitude($min = -90, $max = 90),
        'lng'        => $faker->longitude($min = -180, $max = 180),
        'open_on'    => '10:00:00',
        'closed_on'  => '20:00:00'
    ];
});