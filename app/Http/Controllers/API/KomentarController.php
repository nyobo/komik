<?php
    namespace App\Http\Controllers\API;

    use App\Http\Requests\KomentarRequest;
    use App\Http\Controllers\API\BaseController as BaseController;
    use App\Komentar;
    use App\KomentarLnD;
    use App\LNDKomentar;
    use Symfony\Component\HttpFoundation\Request;
    use Validator;
    
    class KomentarController extends BaseController
    {
        public function index(KomentarRequest $request)
        {
            $input = $request->all();
            $action = $request->get('action');
            $idKomikDetail = $request->get('id_komik_detail');
            //? action 1 get base koment limit 4
            if ( $action == 1) {
                $komentar = Komentar::getKomentarPopulare();
                return $this->sendResponse($komentar, 'komentars retrieved successfully.');
                // return $this->sendResponse($komentar,'komentar successfully');
            }
            if (!empty($idKomikDetail)) {
                $order = $request->get('order');
                $page = $request->get('page');
                
                $komentar = Komentar::getKomentarByIdKomikDetail($idKomikDetail,$order,$page,$request);
                return $this->sendResponse($komentar, 'komentars by id detail successfully.');
            }
            $komentars = Komentar::latest()->get();
            return $this->sendResponse($komentars->toArray(), '$komentars retrieved successfully.');
            // return response()->json($komentars);
        }
        public function store(Request $request)
        {
        // Jika menggukana validation
        $input = $request->all();
        $validator = Validator::make($input, [
            'komentar' => 'required',
            'like' => 'required',
            'unlike' => 'required',
            'id_komik_detail' => 'required',
            'id_user' => 'required',
            'komentar_name' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
            // $komentar = Komentar::create($request->all());
        if (Komentar::where('id_user','=',$request->get('id_user'))->where('id_komik_detail','=',$request->get('id_komik_detail'))->exists()) {
            return $this->sendError('id user doest exists');
        }
            // $komentar = Komentar::create(
            // [
            //     'komentar' =>$request->get('komentar'),
            //     'like' => $request->get('like'),
            //     'unlike' => $request->get('unlike'),
            //     'id_komik_detail' =>$request->get('id_komik_detail'),
            //     'id_user' => $request->get('id_user'),
            //     'username' => $request->get('username'),
            // ]);
            $komentar = Komentar::create($input);
            return response()->json($komentar, 201);
        }
        public function show($id)
        {
            $komentar = Komentar::findOrFail($id);
            if (is_null($komentar)) {
                return $this->sendError('Product not found.');
            }            
            return response()->json($komentar);
        }
        public function update(KomentarRequest $request, $id)
        {
            // $input = $request->all();
            // $validator = Validator::make($input, [
            //     'komentar' => 'required',
            //     'like' => 'required',
            //     'unlike' => 'required',
            //     'id_user' => 'required',
            //     'action'=> 'required'
            // ]);

            // if ($validator->fails()) {
            //     return $this->sendError('Validation Error.', $validator->errors());
            // }
            
            // $komentar = Komentar::findOrFail($id);
            // $action = $request->get('action');
            // $komentarLnD = KomentarLnD::cekLikeAndDislike($komentar->id_user,$komentar->id);
            
            // $getKomentarLnD = $komentarLnD->get();
            // $getKomentarLnDArray = $komentarLnD->get()->last();
            // if ($komentarLnD->exists()) {
            //     //? jika ada komentar lnd maka  
            //     try {
            //         if ($getKomentarLnDArray->action == $action) {
            //             //! delete
            //             KomentarLnD::destroy($getKomentarLnDArray->id);
            //         }else{
            //             $getKomentarLnD->$action;
            //             $getKomentarLnD->save();
            //         }
            //         $komentar->action = $input['action'];
            //         if ($input['action']) {
            //             $komentar->like = $input['like'];
            //         }else{
            //             $komentar->like = $input['unlike'];
            //         }
            //         $komentar->komentar = $input['komentar'];
            //         $komentar->update();
            //     } catch (\Throwable $th) {
            //         return $this->sendError('Validation Error.', $th);
            //     }
            // }else{
            //     try {
            //         $komentar->action = $input['action'];
            //         if ($input['action']) {
            //             $komentar->like = $input['like'];
            //         }else{
            //             $komentar->like = $input['unlike'];
            //         }
            //         $komentar->komentar = $input['komentar'];
            //         $komentar->update();

            //         KomentarLnD::create(
            //             [
            //              'id_user' => $komentar->id_user,
            //              'id_komentar' => $komentar->id,
            //              'action' => $input['action'],
            //          ]);
                     
            //     } catch (\Throwable $th) {
            //         return $this->sendError('Validation Error.', $th);
            //     }
                
                
            // }
            

            // //kalau mengunakan yang atas bawah ini di hapus
            // // $komentar->update($request->all());
            // return response()->json($komentar, 200);
            $komentar = Komentar::findOrFail($id);
            //kalau mengunakan yang atas bawah ini di hapus
            $komentar->update($request->all());
            return response()->json($komentar, 200);
        }
        public function destroy($id)
        {
            Komentar::destroy($id);
            LNDKomentar::where('id_komentar','=',$id)->delete();
            return response()->json(null, 204);
        }
    }
