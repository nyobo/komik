<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\SearchKomikRequest;

class SearchKomikController extends BaseController
{
    public static function searchKomiks(SearchKomikRequest $request){
        $reg = $request->all();
        print_r($reg);
    }
}
