<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = "device";
    protected $guarded = ['id'];
    protected $fillable = [
        'device_name',
        'device_uuid',
        'device_version',
        'device_name_id',
    ];
    public static function getDataById($id){
        //defaul array
        $device =Device::where('id','=',$id)->get()->toArray();
        return $device;
    }
    
    public static function getDataByName($name){
        //defaul array
        $device =Device::where('device_name','=',$name)->get()->toArray();
        return $device;
    }
    public static function getAllDatas(){
        $device = Device::get()->toArray();
        return $device;
    }
    public static function getDataByUUID($uuid){
        $device = Device::where('device_uuid','=',$uuid)->get()->toArray();
        return $device;
    }
    public static function cekDeviceIdByUUID($uuid){
        $device = Device::where('device_uuid','=',$uuid)->get()->last();
        if (empty($device->device_uuid)) {
            return true;
        }else{
            return false;
        }
    }
}
