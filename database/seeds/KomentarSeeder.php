<?php

use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Komentar::class, 12)->create()->each(function ($post) {
            $post->save();
        });
    }
}
