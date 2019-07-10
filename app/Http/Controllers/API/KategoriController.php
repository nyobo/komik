<?php
    namespace App\Http\Controllers\API;

    use App\Http\Requests\KategoriRequest;
    use App\Http\Controllers\API\BaseController as BaseController;
    use App\Kategori;
    use Validator;
    class KategoriController extends BaseController
    {
        public function index()
        {
            $kategoris = Kategori::latest()->get();
            return response()->json($kategoris);
        }
        public function store(KategoriRequest $request)
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
            $kategori = Kategori::create($request->all());
            return response()->json($kategori, 201);
        }
        public function show($id)
        {
            // if (is_null($kategori)) {
            //     return $this->sendError('Product not found.');
            // }            
            $kategori = Kategori::findOrFail($id);
            return response()->json($kategori);
        }
        public function update(KategoriRequest $request, $id)
        {
            // $input = $request->all();
            // $validator = Validator::make($input, [
            //     'name' => 'required',
            //     'detail' => 'required'
            // ]);


            // if ($validator->fails()) {
            //     return $this->sendError('Validation Error.', $validator->errors());
            // }


            // $kategori->name = $input['name'];
            // $kategori->detail = $input['detail'];
            // $kategori->save();

            $kategori = Kategori::findOrFail($id);
            //kalau mengunakan yang atas bawah ini di hapus
            $kategori->update($request->all());
            return response()->json($kategori, 200);
        }
        public function destroy($id)
        {
            Kategori::destroy($id);
            return response()->json(null, 204);
        }
    }
