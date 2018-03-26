<?php

$factory->define(App\Models\Image::class, function (Faker\Generator $faker) {

    return [
        'product_id' => $faker->numberBetween($min = 1, $max = 5),
        'path'       => env('APP_URL') . '/images/products/placeholder300x300.jpg',
    ];
});