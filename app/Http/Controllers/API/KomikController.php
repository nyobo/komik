<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\KomikRequest;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Komik;
use App\KomikDetail;
use App\Kategori;
use Validator;

class KomikController extends BaseController
{
    public function index()
    {
        $id_jadwal = Input::get('id_jadwal')!= null ? Input::get('id_jadwal') : '';
        $id_kategori = Input::get('id_kategori')!= null ? Input::get('id_kategori') : '';
        if ($id_jadwal != null) {
            $komiks = Komik::where('id_jadwal','=',$id_jadwal)->get();
        }elseif($id_kategori !=null){
            $komiks = Komik::where('id_kategori','=',$id_kategori)->get();
        }else{
            $komiks = Komik::latest()->get();
        }
        return $this->sendResponse($komiks->toArray(), 'Komiks retrieved successfully.');
        // return response()->json($komiks);
    }
    public function store(KomikRequest $request)
    {
        //Jika menggukana validation
        $input = $request->all();

        $validator = Validator::make(
            $input,
            [
                'judul' => 'required',
                'discription' => 'required',
                'id_autor' => 'required',
                'id_jadwal' => 'required',
                'id_kategori' => 'required',
                'image_profile' => 'mimes:jpeg,png,bmp,tiff |max:4096 |required',
            ],
            [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if ($request->file('image_profile')) {
            $file = $request->file('image_profile');
            // $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            // $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
            $fileName = rand(11111, 99999) . '.' . $acak;
            $request->file('image_profile')->move("images/komik", $fileName);
            $imageProfil = $fileName;
        } else {
            $imageProfil = NULL;
        }
        $kategori = Kategori::where('id', '=', $request->get('id_kategori'))->exists();
        if (!$kategori) {
            return $this->sendError('Kategori dose not exists');
        }
        $user = Auth::user();
        $komik = Komik::create([
            'judul' => $request->get('judul'),
            'discription' => $request->get('discription'),
            'rating' => $request->get('rating'),
            'image_profile' => $imageProfil,
            'status' => $request->get('status'),
            'id_autor' => $user->id,
            'id_kategori' => $request->get('id_kategori'),
            'id_jadwal' => $request->get('id_jadwal'),
        ]);
        // $komik = Komik::create($request->all());
        return response()->json($komik, 201);
        // return response()->json($komik, 201);
    }
    public function show($id)
    {
        // if (is_null($komik)) {
        //     return $this->sendError('Product not found.');
        // }
        $komik = Komik::findOrFail($id)->toArray();
        $dbKomikDetail = KomikDetail::where('id_komik','=',$id);
        $jmlKomikDetail = $dbKomikDetail->count();
        $komikDetail = $dbKomikDetail->limit(1)->orderBy('no_urut','asc')->get()->toArray();
        // array_push($komik,$komikDetail->)
        $kategoriName  = Kategori::where('id', '=' ,$komik['id_kategori'])->limit(1)->get()->toArray()[0]['judul'];
        $fristIdKomikDetail = $komikDetail != null ? $komikDetail[0]['id'] : 0 ;
        $tester =array_merge(
            $komik,
            [
                'frist_id_komik_detail'=>$fristIdKomikDetail,
                'jumlah_komik_detail'=>$jmlKomikDetail,
                'kategori' => $kategoriName
            ]
        );
        return response()->json($tester);
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
