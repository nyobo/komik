<?php

use Illuminate\Database\Seeder;

class ViewKomikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ViewKomik::class, 300)->create()->each(function ($post) {
            $post->save();
        });
    }
}
