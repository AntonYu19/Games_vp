<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models;
use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'image' => '/img/cover/game-1.jpg',
        'price' => 10 * round(0.1 * mt_rand(100, 1000)),
        'category_id' => mt_rand(1, 5)
        
    ];
});
