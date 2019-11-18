<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Banner extends Model
    {
        protected $guarded = ['id'];
        public static function getAllDataWithPagination($index = 6){
            $products = Banner::paginate($index);
            return $products;
        }
    }   
