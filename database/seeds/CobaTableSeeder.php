<?php

use Illuminate\Database\Seeder;

class CobaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Coba::class, 500)->create()->each(function ($post) {
        //     $post->save();
        // });
        factory(App\Kategori::class, 500)->create()->each(function ($post) {
            $post->save();
        });
    }
}
