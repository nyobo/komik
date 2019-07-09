<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
// bikin Factory dulu
// bikin model dulu
//php artisan make:seeder CobaTableSeeder
//php artisan db:seed
// composer dump-autoload,

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(10),
        'detail' => $faker->sentence(10),
    ];
});
