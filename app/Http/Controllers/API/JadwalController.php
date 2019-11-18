<?php
    namespace App\Http\Controllers\API;

    use App\Http\Requests\JadwalRequest;
    use App\Http\Controllers\API\BaseController as BaseController;
    use App\Jadwal;
    use Validator;
    class JadwalController extends BaseController
    {
        public function index()
        {
            $jadwals = Jadwal::latest()->get();
            return $this->sendResponse($jadwals->toArray(), 'jadwals retrieved successfully.');
            // return response()->json($jadwals);
        }
        public function store(JadwalRequest $request)
        {
        //Jika menggukana validation
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'color' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
            $jadwal = Jadwal::create($request->all());
            return response()->json($jadwal, 201);
        }
        public function show($id)
        {
            // if (is_null($jadwal)) {
            //     return $this->sendError('Product not found.');
            // }            
            $jadwal = Jadwal::findOrFail($id);
            return response()->json($jadwal);
        }
        public function update(JadwalRequest $request, $id)
        {
            // $input = $request->all();
            // $validator = Validator::make($input, [
            //     'name' => 'required',
            //     'detail' => 'required'
            // ]);


            // if ($validator->fails()) {
            //     return $this->sendError('Validation Error.', $validator->errors());
            // }


            // $jadwal->name = $input['name'];
            // $jadwal->detail = $input['detail'];
            // $jadwal->save();

            $jadwal = Jadwal::findOrFail($id);
            //kalau mengunakan yang atas bawah ini di hapus
            $jadwal->update($request->all());
            return response()->json($jadwal, 200);
        }
        public function destroy($id)
        {
            Jadwal::destroy($id);
            return response()->json(null, 204);
        }
    }
