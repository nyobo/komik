<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalHarianController extends Controller
{
    public static function index(){
        session(['nav-active'=>'jadwal-harian']);
        return view('komik\jadwal-harian\jadwal-harian');
    }
}
