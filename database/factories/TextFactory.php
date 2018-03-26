<?php

$factory->define(App\Models\Text::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->name,
        'content' => $faker->text($maxNbChars = 150),
    ];
});