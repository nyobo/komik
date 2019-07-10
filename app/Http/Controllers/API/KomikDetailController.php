<?php
    namespace App\Http\Controllers\API;

    use App\Http\Requests\KomikDetailRequest;
    use App\Http\Controllers\API\BaseController as BaseController;
    use App\KomikDetail;
    use App\Komik;
    use App\ImageKomikDetails;
    use Validator;
    class KomikDetailController extends BaseController
    {
        public function index()
        {
            $komikdetails = KomikDetail::latest()->get();
            // return response()->json($komikdetails);
             return $this->sendResponse($komikdetails->toArray(), 'Komik Details retrieved successfully.');
        }
        public function store(KomikDetailRequest $request)
        {
            // Jika menggukana validation
            $input = $request->all();

            $validator = Validator::make($input, [
                'judul' => 'required',
                'image' => 'required |mimes:jpeg,png,bmp,tiff |max:4096',
                'id_komik' => 'required'
                'images' =>'required |mimes:jpeg,png,bmp,tiff |max:4096',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            if ($request->file('image')) {
                $file = $request->file('image');
                // $dt = Carbon::now();
                $acak  = $file->getClientOriginalExtension();
                // $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
                $fileName = rand(11111, 99999) . '.' . $acak;
                $request->file('image')->move("images/komik_detail", $fileName);
                $image = $fileName;
            } else {
                $image = NULL;
            }
            // if ($request->file('images')) {
            //     $images =$request->file('images');
            //     foreach ($images as $image) {
            //         $filename =$file->getClientOriginalExtension();
            //     }
            //     // $acak =$file->getClientOriginalExtension();
            //     // $fileName =rand(11111,9999).'.'.$acak;
            //     // $request->file('images')->move()
            // }else{

            // }
            $cekKomik = Komik::where('id', '=', $request->get('id_komik'))->exists();
            if (!$cekKomik) {
                return $this->sendError('Komik not Found');
            }
             $komikdetail = KomikDetail::create([
                'judul' => $request->get('judul'),
                'image' => $image,
                'id_komik' => $request->get('id_komik')
            ]);
            // $komikdetail = KomikDetail::create($request->all());
            // return response()->json($komikdetail, 201);
              return $this->sendResponse($komikdetail->toArray(), 'Komiks retrieved successfully.');
        }
        public function show($id)
        {
            // if (is_null($komikdetail)) {
            //     return $this->sendError('Product not found.');
            // }            
            $komikdetail = KomikDetail::findOrFail($id);
            return response()->json($komikdetail);
        }
        public function update(KomikDetailRequest $request, $id)
        {
            // $input = $request->all();
            // $validator = Validator::make($input, [
            //     'name' => 'required',
            //     'detail' => 'required'
            // ]);


            // if ($validator->fails()) {
            //     return $this->sendError('Validation Error.', $validator->errors());
            // }


            // $komikdetail->name = $input['name'];
            // $komikdetail->detail = $input['detail'];
            // $komikdetail->save();

            $komikdetail = KomikDetail::findOrFail($id);
            //kalau mengunakan yang atas bawah ini di hapus
            $komikdetail->update($request->all());
            return response()->json($komikdetail, 200);
        }
        public function destroy($id)
        {
            KomikDetail::destroy($id);
            return response()->json(null, 204);
        }
    }
