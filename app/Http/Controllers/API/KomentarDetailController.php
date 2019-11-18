<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\KomentarDetailRequest;
use App\Http\Controllers\API\BaseController as BaseController;
use App\KomentarDetail;
use App\Komentar;
use Validator;
class KomentarDetailController extends BaseController
{
    public function index(KomentarDetailRequest $request)
        {
            $idKomentar = $request->get('id_komentar');

            //? action 1 get base koment limit 4

            if (!empty($idKomentar)) {
                $page = $request->get('page');
                $komentar = Komentar::getDataById($idKomentar);
                $komentarDetail = KomentarDetail::getKomentarDetailByIdKomentar($idKomentar,$page);
                $response = [
                    'success' => true,
                    'data-komentar' => $komentar,
                    'data'    => $komentarDetail,
                ];
                return response()->json($response,200);
            }
            ;
            $komentarDetails = KomentarDetail::latest()->get();
            return $this->sendResponse($komentarDetails->toArray(), 'komentars Details retrieved successfully.');
            
            // return response()->json($komentars);
        }
        public function store(KomentarDetailRequest $request)
        {
        // Jika menggukana validation
        $input = $request->all();
        $validator = Validator::make($input, [
            'komentar' => 'required',
            'id_user' => 'required',
            'id_komentar' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
            // $komentar = KomentarDetail::create($request->all());
            $komentar = KomentarDetail::create([
                'komentar' => $request->get('komentar'),
                'id_user' => $request->get('id_user'),
                'id_komentar' => $request->get('id_komentar'),
            ]);
            return response()->json($komentar, 201);
        }
        public function show($id)
        {
            $komentar = KomentarDetail::findOrFail($id);
            if (is_null($komentar)) {
                return $this->sendError('Product not found.');
            }            
            return response()->json($komentar);
        }
        public function update(KomentarDetailRequest $request, $id)
        {
            // $input = $request->all();
            // $validator = Validator::make($input, [
            //     'name' => 'required',
            //     'detail' => 'required'
            // ]);


            // if ($validator->fails()) {
            //     return $this->sendError('Validation Error.', $validator->errors());
            // }


            // $komentar->name = $input['name'];
            // $komentar->detail = $input['detail'];
            // $komentar->save();

            $komentar = KomentarDetail::findOrFail($id);
            //kalau mengunakan yang atas bawah ini di hapus
            $komentar->update($request->all());
            return response()->json($komentar, 200);
        }
        public function destroy($id)
        {
            KomentarDetail::destroy($id);
            return response()->json(null, 204);
        }
}
