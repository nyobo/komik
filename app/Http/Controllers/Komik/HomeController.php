<?php

namespace App\Http\Controllers\Komik;

use App\Komik;
use App\KomikDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // echo "tester";
        // $komiks = Komik::latest()->get()->toArray();
        // foreach ($komiks as $komik) {
        //     // print_r();
        //     $id = $komik['id'];

        //     $komikdetails = KomikDetail::latest()->where('id_komik', '=', $id)->get()->toArray();
        //     if ($komikdetails != null) {

        //         print("<pre>" . print_r($komikdetails, true) . "</pre>");
        //     }
        // }
        // var_dump($komiks);
        return view('home');
    }
}
