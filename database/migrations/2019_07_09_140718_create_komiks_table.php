<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomikSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komiks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('discription');
            $table->string('rating');
            $table->string('image_profile');
            $table->integer('status');
            $table->integer('id_autor');
            $table->integer('id_kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komiks');
    }
}
