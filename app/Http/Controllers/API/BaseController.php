<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message,$showcount = false)
    {
        $jumlah = 0 ;
        if (!is_array($result)) {
            $jumlah = $result->count();
        }else{
            $jumlah = count($result);
        }
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'jumlah'  => $jumlah
        ];


        return response()->json($response, 200);
    }
    
    public function sendResponseCreate($result,$message,$showcount =false){
        $response = [
            'success' => true,
            'data' =>$result,
            'message' => $message
        ];
        return response()->json($response,201);
    }

    public function sendResponseDelete($result,$message,$showcount =false){
        $response = [
            'success' => true,
            'data' =>$result,
            'message' => $message
        ];
        return response()->json($response,204);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
