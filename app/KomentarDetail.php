<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarDetail extends Model
{
    // id	komentar	id_user	created_at	updated_at
    // protected $guarded = ['id'];
    protected $table = "komentar_detail";
    protected $fillable = [
        'komentar',
        'id_user',
        'id_komentar',
    ];
    public static function getDataById($id){
        //defaul array
        $komentarDetail =KomentarDetail::where('id','=',$id)->get()->last()->toArray();
        return $komentarDetail;
    }
    public static function getKomentarDetailByIdUser($id){
        $komentarDetail = KomentarDetail::where('id_user','=',$id)->get()->toArray();
        return $komentarDetail;
    }
    public static function getKomentarDetailByIdKomentar($id,$page){

        $komentarDetail = KomentarDetail::where('id_komentar','=',$id)->paginate(3,['*'],'page',$page)->toArray();
        
        return $komentarDetail;
    }
    public static function countKomentarDetailByIdKomentar($id){
        $komentarDetail = KomentarDetail::where('id_komentar','=',$id)->get()->count();
        return $komentarDetail;
    }
}
