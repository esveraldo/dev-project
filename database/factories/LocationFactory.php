<?php

$factory->define(App\Models\Location::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->randomElement([1, 2]),
        'lat'     => $faker->latitude($min = -90, $max = 90),
        'lng'     => $faker->longitude($min = -180, $max = 180),
    ];
});