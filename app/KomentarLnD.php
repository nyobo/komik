<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarLnD extends Model
{

    protected $table = "like_unlike_komentar";
    protected $guarded = ['id'];
    protected $fillable = [
        'id_komentar',
        'id_user',
        'action',
    ];
    public static function cekLikeAndDislike($idUser,$komentarId){
        $komentarLnD = KomentarLnD::where('id_user','=',$idUser)->where('id_komentar','=',$komentarId);
        return $komentarLnD;
    }
}
