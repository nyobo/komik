<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home');
    }
    public function latihan(){
        return view('frontend.pages.latihan');
    }
}
