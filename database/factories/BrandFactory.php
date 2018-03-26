<?php

$factory->define(App\Models\Brand::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->company,
        'status' => $faker->randomElement([0, 1]),
    ];
});