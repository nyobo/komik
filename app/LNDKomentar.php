<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LNDKomentar extends Model
{
    protected $table = "lnd_komentar";
    protected $guarded = ['id'];
    protected $fillable = [
        'id_komentar',
        'id_user',
        'action',
    ];
    public static function getDataByID($id,$action)
    {
        $likeKomentar =  LNDKomentar::where('id','=',$id)->where('action','=',$action)->get()->lase();
        return $likeKomentar;
    }
    public static function getDataByIdUser($idUser)
    {
        $likeKomentar = LNDKomentar::where('id_user','=',$idUser)->get()->last();
        return $likeKomentar;
    }
    public static function getDataByIdKomentar($idKomentar,$action)
    {
        $likeKomentar = LNDKomentar::where('id_komentar','=',$idKomentar)->where('action','=',$action)->get();
        return $likeKomentar;
    }
    public static function getDataByIdUserAndIdKomentar($idUser,$idKomentar,$action){
        //! mengambil like berdasarkan id komentar dan id user 
        $countLike = LNDKomentar::where('id_user','=',$idUser)->where('id_komentar','=',$idKomentar)->get()->last();
        return $countLike;
    }
    public static function countLikeByIdUserAndIdKomentar($idKomentar){
        //! mengambil like berdasarkan id komentar dan id user 
        $countLike = LNDKomentar::where('id_komentar','=',$idKomentar)->where('action','=',1)->get()->count();
        return $countLike;
    }
    public static function countDislikeByIdUserAndIdKomentar($idKomentar){
        //! mengambil like berdasarkan id komentar dan id user 
        $countLike = LNDKomentar::where('id_komentar','=',$idKomentar)->where('action','=',2)->get()->count();
        return $countLike;
    }
}
