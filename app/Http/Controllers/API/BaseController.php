<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //
      public function generateJSON($status, $code, $message = null, $data =null)
    {
        $json_result = null;

        if($status=='error'){
            $json_result = json_encode([
                'status' => $status,
                'code' => $code,
                'message' => $message
            ]);
        }elseif ($status == 'success'){
            $json_result = json_encode([
                'status' => $status,
                'code' => $code,
                'data' => $data
            ]);
        }else{
            return null;
        }

        return $json_result;
    }
    
    
    
    
        public function sendResponse($result, $message)

    {

    	$response = [

            'success' => true,

            'data'    => $result,

            'message' => $message,

        ];


        return response()->json($response, 200);

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


        if(!empty($errorMessages)){

            $response['data'] = $errorMessages;

        }


        return response()->json($response, $code);

    }
}
