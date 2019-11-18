<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    //
    public function index(){
        return view('backend.index');
    }
}
