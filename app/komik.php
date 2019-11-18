<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Komik extends Model
    {
        protected $guarded = ['id'];
        public static function getKomikByIdJadwal($id){
            $jadwal = Komik::where('id_jadwal','=',$id)->limit(5)->get()->toArray();
            return $jadwal;            
        }
        public static function cekKomikById($id){
            $komik = Komik::where('id', '=' ,$id )->get()->last();
            if ($komik != null) {
                return true;
            }
            return false;
        }
    }
