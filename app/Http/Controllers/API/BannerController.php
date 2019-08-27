<?php
    namespace App\Http\Controllers\API;

    use App\Http\Requests\BannerRequest;
    use App\Http\Controllers\API\BaseController as BaseController;
    use App\Banner;
    use Validator;
    class BannerController extends BaseController
    {
        public function index()
        {
            $banners = Banner::latest()->get();
            return $this->sendResponse($banners->toArray(), 'banners retrieved successfully.');
            // return response()->json($banners);
        }
        public function store(BannerRequest $request)
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
        $input = $request->all();

        $validator = Validator::make($input, [
            // 'judul' => 'required',
            'image' => 'required |mimes:jpeg,png,bmp,tiff |max:4096',
            // 'id_komik' => 'required',
            // 'images.*' =>'image',
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
            $request->file('image')->move("images/banner", $fileName);
            $image = $fileName;
        } else {
            $image = NULL;
        }
        
        // $cekKomik = Komik::where('id', '=', $request->get('id_komik'))->exists();
        // if (!$cekKomik) {
        //     return $this->sendError('Komik not Found');
        // }
        // $noUrut = 1;
        // $KomikDetail = KomikDetail::where('id_komik','=',$request->get('id_komik'));
        // if ($KomikDetail->exists()) {
        //     $noUrut = $KomikDetail->get()->count() + 1;
        // }
        $banner = Banner::create(['image' => $image]);
        return response()->json($banner, 201);
        }
        public function show($id)
        {
            // if (is_null($banner)) {
            //     return $this->sendError('Product not found.');
            // }            
            $banner = Banner::findOrFail($id);
            return response()->json($banner);
        }
        public function update(BannerRequest $request, $id)
        {
            // $input = $request->all();
            // $validator = Validator::make($input, [
            //     'name' => 'required',
            //     'detail' => 'required'
            // ]);


            // if ($validator->fails()) {
            //     return $this->sendError('Validation Error.', $validator->errors());
            // }


            // $banner->name = $input['name'];
            // $banner->detail = $input['detail'];
            // $banner->save();

            $banner = Banner::findOrFail($id);
            //kalau mengunakan yang atas bawah ini di hapus
            $banner->update($request->all());
            return response()->json($banner, 200);
        }
        public function destroy($id)
        {
            Banner::destroy($id);
            return response()->json(null, 204);
        }
    }
