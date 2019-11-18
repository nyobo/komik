<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewKomik extends Model
{
    protected $table = "table_view_komik";
    protected $fillable = [
        'device_id',
        'komik_id',
    ];
    public static function  getViewKomikByIdKomik($idKomik)
    {
        $viewKomik =ViewKomik::where('komik_id', '=', $idKomik)->get()->count();
        return $viewKomik;
    }
}
