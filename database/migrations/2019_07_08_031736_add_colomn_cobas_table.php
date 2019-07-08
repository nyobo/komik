<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColomnCobasTable extends Migration
{
    //how to add colom
    // php artisan make:migration add_colomn_cobas_table --table="cobas"
    // add $table->string('coba_description')->after('coba_code');
    // php artisan migrate
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cobas', function (Blueprint $table) {
            $table->string('coba_description')->after('coba_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cobas', function (Blueprint $table) {
            $table->dropColumn('coba_description');
        });
    }
}
