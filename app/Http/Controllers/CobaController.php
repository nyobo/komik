<?php

namespace App\Http\Controllers;

use App\Http\Requests\CobaRequest;
use App\Coba;
use App\Http\Controllers\API\BaseController;

class CobaController extends BaseController
{
    public function index()
    {
        $cobas = Coba::latest()->get();
        return $this->sendResponse($cobas->toArray(), 'Products retrieved successfully.');
        // return response()->json($cobas);
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
