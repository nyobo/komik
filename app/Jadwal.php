<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Jadwal extends Model
    {
        protected $guarded = ['id'];
        public static function getDataHari(){
            
            $jadwal =Jadwal::where('status','=',0)->get()->toArray();
            return $jadwal;
        }
    }
