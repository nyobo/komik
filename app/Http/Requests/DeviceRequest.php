<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class DeviceRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }
        public function rules()
        {
            return [];
            // return [
            //     'device_name'       => 'required',
            //     'device_uuid'       => 'required',
            //     'device_verison'    => 'required',
            //     'device_name_id'    => 'required',
            // ];
        }
    }

