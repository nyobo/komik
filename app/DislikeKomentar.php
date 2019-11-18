<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DislikeKomentar extends Model
{
    public static function getDataByID($id)
    {
        $likeKomentar =  DislikeKomentar::where('id','=',$id)->get()->lase();
        return $likeKomentar;
    }
    public static function getDataByIdUser($idUser)
    {
        $likeKomentar = DislikeKomentar::where('id_user','=',$idUser)->get();
        return $likeKomentar;
    }
    public static function getDataByIdKomentar($idKomentar)
    {
        $likeKomentar = DislikeKomentar::where('id_komentar','=',$idKomentar)->get();
        return $likeKomentar;
    }
    public static function getDisLikeByIdUserAndIdKomentar($idUser,$idKomentar){
        //! mengambil dislike berdasarkan id komentar dan id user 
        $countLike = DislikeKomentar::where('id_user','=',$idUser)->where('id_komentar','=',$idKomentar)->get()->count();
        return $countLike;
    }
}
