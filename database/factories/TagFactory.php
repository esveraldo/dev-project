<?php

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word .' '.$faker->word,
    ];
});