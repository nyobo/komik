<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Komentar;
use Faker\Generator as Faker;

$factory->define(Komentar::class, function (Faker $faker) {
    return [
        'id_user' => $faker->sentence(10),
        'komentar' => $faker->sentence(10),
        'like' => 0,
        'unlike' => 0,
        'action' => 0,
        'komentar_name' => "admin",
        'id_komik_detail' => 10,
    ];
});
