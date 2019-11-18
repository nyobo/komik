<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class KomikDetailRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }
        public function rules()
        {
            return [
                // 'judul' => 'required',
                // 'image' => 'required |mimes:jpeg,png,bmp,tiff',
                // 'id_komik' => 'required',
                // 'images.*' =>'image',
            ];
        }
    }
