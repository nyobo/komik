<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class ViewKomikRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }
        public function rules()
        {
            return [];
        }
    }

