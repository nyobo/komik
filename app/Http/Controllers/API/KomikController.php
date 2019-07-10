<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\KomikRequest;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Komik;
use App\Kategori;
use Validator;

class KomikController extends BaseController
{
    public function index()
    {
        $komiks = Komik::latest()->get();
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
