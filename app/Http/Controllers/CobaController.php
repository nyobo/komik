<?php

namespace App\Http\Controllers;

use App\Http\Requests\CobaRequest;
use App\Coba;

class CobaController extends Controller
{
    public function index()
    {
        $cobas = Coba::latest()->get();
        return response()->json($cobas);
    }
    public function store(CobaRequest $request)
    {
        $coba = Coba::create($request->all());
        return response()->json($coba, 201);
    }
    public function show($id)
    {
        $coba = Coba::findOrFail($id);
        return response()->json($coba);
    }
    public function update(CobaRequest $request, $id)
    {
        $coba = Coba::findOrFail($id);
        $coba->update($request->all());
        return response()->json($coba, 200);
    }
    public function destroy($id)
    {
        Coba::destroy($id);
        return response()->json(null, 204);
    }
}
