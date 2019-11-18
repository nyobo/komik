<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ViewKomik;
use Faker\Generator as Faker;

$factory->define(ViewKomik::class, function (Faker $faker) {
    return [
        // 'judul' => $faker->sentence(10),
        // 'color' => '#FFF',
        // 'status' => 1
        'device_id' => 'cobadevice3',
        'komik_id' => 3,
    ];
});
