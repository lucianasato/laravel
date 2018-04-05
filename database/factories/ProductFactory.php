<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'stock' => rand(0, 100),
        'stock_maximum' => rand(0, 100),
        'price_sale' => rand(1, 100),
        'price_purchase' => rand(1, 100)
    ];
});