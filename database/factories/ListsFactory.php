<?php

$factory->define(App\Models\Lista::class, function (Faker\Generator $faker) {

    return [
        'name' => 'Lista ' . $faker->text(20),
        'token' => str_random(45)
    ];
});