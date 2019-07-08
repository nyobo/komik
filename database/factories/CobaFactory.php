<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
// bikin Factory dulu
// bikin model dulu
//php artisan make:seeder CobaTableSeeder
//php artisan db:seed
// composer dump-autoload,

use App\Coba;
use Faker\Generator as Faker;

$factory->define(Coba::class, function (Faker $faker) {
    return [
        'coba_code' => $faker->sentence(10),
        'coba_description' => $faker->sentence(10),
        'masuk' => $faker->sentence(10)
    ];
});
