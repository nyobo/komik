<?php

namespace App\Http\Controllers;

use App\Http\Requests\testerRequest;
use App\tester;

class testerController extends Controller
{
    public function index()
    {
        $testers = tester::latest()->get();
        return response()->json($testers);
    }
    public function store(testerRequest $request)
    {
        $tester = tester::create($request->all());
        return response()->json($tester, 201);
    }
    public function show($id)
    {
        $tester = tester::findOrFail($id);
        return response()->json($tester);
    }
    public function update(testerRequest $request, $id)
    {
        $tester = tester::findOrFail($id);
        $tester->update($request->all());
        return response()->json($tester, 200);
    }
    public function destroy($id)
    {
        tester::destroy($id);
        return response()->json(null, 204);
    }
}
