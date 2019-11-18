<?php
    namespace App\Http\Controllers\API;

    use App\Http\Controllers\API\BaseController as BaseController;
    use Illuminate\Support\Facades\Input;
    use App\Http\Requests\DeviceRequest;
    use App\Http\Requests\ViewKomikRequest;
    use App\Http\Requests\DeviceNameRequest;
    use App\Device;
    use App\DeviceName;
    use App\ViewKomik;
    use App\Komik;
    use Validator;
    class DeviceController extends BaseController
    {


        public function addDevice(DeviceRequest $request){
            // $validator = $request->validated();
            $input = $request->all();
            // die();
            $validator = Validator::make($input, [
                'device_name'       => 'required',
                'device_uuid'       => 'required',
                'device_verison'    => 'required',
                'device_name_id'    => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
        
            $device = new Device();
            // $deviceName = new DeviceName();
            // $sDeviceName = $deviceName->getDeviceNameById($request->get('device_name_id'));
            // if ($sDeviceName == null) {
            //     return $this->sendError('validate Error device name not found');
            // }
            $device->getAllDatas();
            $response = $device::updateOrCreate(
                [   
                    'device_uuid' =>$request->get('device_uuid'),
                ],[
                    'device_name' =>$request->get('device_name'),
                    'device_verison' => $request->get('device_verison'),
                    'device_name_id'=> $request->get('device_name_id'),
                    'updated_at' => now(),
                ]
            );

            return response()->json($response, 201);
            // return $this->sendResponse($response,'device success');
            
        }
        public function addDeviceName(DeviceNameRequest $request){
            $input = $request->all();
            // die();
            $validator = Validator::make($input, [
                'device_name'       => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $deviceName = new DeviceName();
            $deviceName::create([
                'device_name' =>$request->get('device_name'),
            ]);
            return $this->sendResponse($deviceName->toArray(), 'device name success');
        }
        public function addViewKomik(ViewKomikRequest $request){
            $input = $request->all();
            $validator = Validator::make($input,[
                'device_id' => 'required',
                'komik_id' =>'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
            
            $viewKomik = new ViewKomik();
            $device = new Device();
            $komik = new Komik();
            if ($device->cekDeviceIdByUUID($request->get('device_id'))) {
                if($komik->cekKomikById($request->get('komik_id'))){
                    $response = $viewKomik::updateOrCreate(
                        [
                            'device_id' => $request->get('device_id'),
                        ],[
                        'device_id' => $request->get('device_id'),
                        'komik_id' => $request->get('komik_id'),
                    ]);
                    return response()->json($response->toArray(), 201);
                }
                return $this->sendError('validate Error komik id found');
            }
            $message = array('message' => 'device id found');
            return response()->json($message,200);
            // return $this->sendError('validate Error device id found');

        }
        public function getViewCountKomik(ViewKomikRequest $request)
        {
            $input = $request->all();
            $viewKomik = new ViewKomik();
            if ($request->get('id_komik')== null) {
                return $this->sendError("id komik tidak ditemukan");
            }
            $viewKomik = ViewKomik::getViewKomikByIdKomik($request->get('id_komik'));
            $arrayViewKomik = array('count_view_komik' => $viewKomik, );
            return $this->sendResponse($arrayViewKomik, 'device name success');

        }
        public function getViewKomikByIdKomikandIdDevice(ViewKomikRequest $request){
            
        }

    }
