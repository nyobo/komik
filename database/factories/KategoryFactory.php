<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
// bikin Factory dulu
// bikin model dulu
//php artisan make:seeder CobaTableSeeder
//php artisan db:seed
// composer dump-autoload,

use App\Kategori;
use Faker\Generator as Faker;

$factory->define(Kategori::class, function (Faker $faker) {
    return [
        'judul' => $faker->sentence(10),
        'color' => '#FFF',
        'status' => 1
    ];
});
