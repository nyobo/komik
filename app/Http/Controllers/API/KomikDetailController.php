<?php
    namespace App\Http\Controllers\API;

    use App\Http\Requests\KomikDetailRequest;
    use App\Http\Controllers\API\BaseController as BaseController;
    use Illuminate\Support\Facades\Input;
    use App\KomikDetail;
    use App\Komik;
    use App\ImageKomikDetails;
    use Validator;
    use DB;
    class KomikDetailController extends BaseController
    {
        public function index()
        {

            // $tester= [];
            // foreach ($komikdetails as $komikdetail) {
            //     $ImagesKomikDetails = ImageKomikDetails::where('id_komik_details', '=', $komikdetail->id)->get();
            //     if ($ImagesKomikDetails->toArray() != null) {;
            //         $tester[]= array_merge($komikdetail->toArray(),['images'=>$ImagesKomikDetails->toArray()]);
            //     }
            // }
            // return response()->json($tester);
            $komikdetail ;
            $id_komik = Input::get('id_komik')!= null ? Input::get('id_komik') : '';
            if ($id_komik!=null) {
                $komikdetail = KomikDetail::where('id_komik','=',$id_komik)->orderBy('created_at','desc')->get();
                $komikdetails = $komikdetail;
            }else{
                $komikdetails = KomikDetail::all();
            }

            return $this->sendResponse($komikdetails, 'Komiks retrieved successfully.');
        }
        public function store(KomikDetailRequest $request)
        {
            $input = $request->all();

            // die();
            $validator = Validator::make($input, [
                'judul' => 'required',
                'image' => 'required |mimes:jpeg,png,bmp,tiff',
                'id_komik' => 'required',
                'images.*' =>'image',
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
            
            $cekKomik = Komik::where('id', '=', $request->get('id_komik'))->exists();
            
            if (!$cekKomik) {
                return $this->sendError('Komik not Found');
            }
            $noUrut = 1;
            $KomikDetail = KomikDetail::where('id_komik','=',$request->get('id_komik'));
            if ($KomikDetail->exists()) {
                $noUrut = $KomikDetail->get()->count() + 1;
            }

            $komikdetail = KomikDetail::create([
                'judul' => $request->get('judul'),
                'image' => $image,
                'id_komik' => $request->get('id_komik'),
                'no_urut'=> $noUrut,
            ]);
             if ($request->hasfile('images')) {
                $images =$request->file('images');
                // print_r($request->file('images'));
                foreach($images as $image)
                {
                    $fileExtension =$image->getClientOriginalExtension();
                    $file = rand(1111,9999).'.'.$fileExtension;
                    $image->move("images/image_komik_details",$file);
                    // $request->file($image)->move("images/image_komik_details",$file);

                    $imageKomikDetail = new ImageKomikDetails();
                    // ImageKomikDetails::create([
                    //     'image'=>$file,
                    //     'id_komik_details'=>$komikdetail->id,
                    // ]);
                    $imageKomikDetail->image = $file;
                    $imageKomikDetail->id_komik_details = $komikdetail->id;
                    $imageKomikDetail->save();
                }
            }
            // print_r($komikdetail->id);
            // die();
            $ImagesKomikDetails = ImageKomikDetails::where('id_komik_details', '=', $komikdetail->id)->get();
            $response = array_merge($komikdetail->toArray(),['images'=>$ImagesKomikDetails->toArray()]);
            // $komikdetail = KomikDetail::create($request->all());
            // return response()->json($komikdetail, 201);
            // $komikAndImage = [
            //     $komikdetail->toArray(),
            //     'data' => $ImagesKomikDetails
            // ];

              return $this->sendResponse($response, 'Komiks retrieved successfully.');
        }
        public function show($id)
        {

            $ids = explode('-',$id);
            $idKomikDetial = $ids[0];
            $noUrut = $ids[1];
            // if (is_null($komikdetail)) {
            //     return $this->sendError('Product not found.');
            // }
            $count = KomikDetail::where('id_komik','=',$idKomikDetial)->get()->count();
            $komikdetail = KomikDetail::where('id_komik','=',$idKomikDetial)->where('no_urut','=',$noUrut)->first();
            $ImagesKomikDetails = ImageKomikDetails::where('id_komik_details', '=', $komikdetail->id)->get();
            $response = array_merge($komikdetail->toArray(),['images'=>$ImagesKomikDetails->toArray()]);
            $response = array_merge($response,['jumlah'=>$count]);
            

            return response()->json($response);
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
