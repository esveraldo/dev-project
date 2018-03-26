<?php

$factory->define(App\Models\Group::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word .' '.$faker->word,
        'status' => $faker->randomElement([0, 1]),
        'category_id' => $faker->randomDigitNotNull,
    ];
});