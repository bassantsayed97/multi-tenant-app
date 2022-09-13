<?php
namespace App\Http\Controllers;

class ApiBaseController extends Controller
{
    public function success($data,$statusCode=200)
    {
        $reponseCollection = [
            'statusCode' => $statusCode,
            'message' => 'success',
            'data'    => $data,
        ];
        return response()->json($reponseCollection);
    }
    public function error($data,$statusCode = 400)
    {
        $reponseCollection = [
            'statusCode' => $statusCode,
            'message' => $data,
            'data'    => $data,
        ];
        return response()->json($reponseCollection);
    }
    public function internalError($message="Internal Server",$statusCode =500)
    {
        $reponseCollection = [
            'statusCode' => $statusCode,
            'message' => $message,
            'data'    => null,
        ];
        return response()->json($reponseCollection);
    }
}
