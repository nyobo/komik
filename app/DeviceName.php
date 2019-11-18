<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceName extends Model
{
    protected $table = "device_name";
    protected $fillable = [
        'device_name',
    ];
    public static function getDeviceNameById($id){
        $deviceName =DeviceName::where('id','=',$id)->get()->last();
        if ($deviceName !=null) {
            return $deviceName->device_name;
        }
        return null;
    }
}
