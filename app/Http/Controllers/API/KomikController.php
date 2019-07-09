<?php
    namespace App\Http\Controllers\API;

    use App\Http\Requests\KomikRequest;
    use App\Http\Controllers\API\BaseController as BaseController;
    use App\Komik;
    use Validator;
    class KomikController extends BaseController
    {
        public function index()
        {
            $komiks = Komik::latest()->get();
            return response()->json($komiks);
        }
        public function store(KomikRequest $request)
        {
        //Jika menggukana validation
        // $input = $request->all();

        // $validator = Validator::make($input, [
        //     'name' => 'required',
        //     'detail' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }
            $komik = Komik::create($request->all());
            return response()->json($komik, 201);
        }
        public function show($id)
        {
            // if (is_null($komik)) {
            //     return $this->sendError('Product not found.');
            // }            
            $komik = Komik::findOrFail($id);
            return response()->json($komik);
        }
        public function update(KomikRequest $request, $id)
        {
            // $input = $request->all();
            // $validator = Validator::make($input, [
            //     'name' => 'required',
            //     'detail' => 'required'
            // ]);


            // if ($validator->fails()) {
            //     return $this->sendError('Validation Error.', $validator->errors());
            // }


            // $komik->name = $input['name'];
            // $komik->detail = $input['detail'];
            // $komik->save();

            $komik = Komik::findOrFail($id);
            //kalau mengunakan yang atas bawah ini di hapus
            $komik->update($request->all());
            return response()->json($komik, 200);
        }
        public function destroy($id)
        {
            Komik::destroy($id);
            return response()->json(null, 204);
        }
    }
