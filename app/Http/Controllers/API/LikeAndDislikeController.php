<?php

namespace App\Http\Controllers\API;
use App\LNDKomentar;
use App\Komentar;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;


class LikeAndDislikeController extends BaseController
{
    public function addLnDKomentar(Request $request){
        //! disini nanti insert like 
        $action = $request->get('action'); //! action = 0 tidak ada , 1 = like , 2 = dislike
        $idKomen = $request->get('id_komentar');
        $input = $request->all();
        $validator = Validator::make($input, [
            'action' => 'required',
            'id_user' => 'required',
            'id_komentar' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $Lndkomentar = LNDKomentar::updateOrCreate(
            [
            'id_user' => $request->get('id_user'),
            'id_komentar' => $request->get('id_komentar'),
            ],
            [
                'id_user' => $request->get('id_user'),
                'id_komentar' => $request->get('id_komentar'),
                'action'=> $action
            ]
        );
        $cekLike = LNDKomentar::countLikeByIdUserAndIdKomentar($idKomen);
        $cekDislike = LNDKomentar::countDislikeByIdUserAndIdKomentar($idKomen);
        $komentar = Komentar::getDataById($idKomen);
        $komentar->like = $cekLike;
        $komentar->unlike = $cekDislike;
        $komentar->save();
        //! save like

        return $this->sendResponseCreate($Lndkomentar, 'Komiks retrieved successfully.');

    }
    public function deleteLnDKomentar(Request $request){
        //! disini nanti delete like 
        $idKomen = $request->get('id_komentar');
        $idUser = $request->get('id_user');
        $action = $request->get('action'); //! action = 0 tidak ada , 1 = like , 2 = dislike
        $input = $request->all();
        $validator = Validator::make($input, [
            'action' => 'required',
            'id_user' => 'required',
            'id_komentar' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
            //! Delete dislike
            $Lndkomentar = LNDKomentar::getDataByIdUserAndIdKomentar($idUser,$idKomen,$action);
            $Lndkomentar = LNDKomentar::destroy($Lndkomentar->id);
        return $this->sendResponseDelete($Lndkomentar, 'Komiks retrieved successfully.');
    }
    public function getLnDKomentar(Request $request)
    {
        $idUser = $request->get('id_user');
        $Lndkomentar = LNDKomentar::getDataByIdUser($idUser);
        return $this->sendResponse($Lndkomentar,'successfully');
    }
}
