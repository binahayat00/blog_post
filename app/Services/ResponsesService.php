<?php

namespace App\Services;

/**
 * Class ResponsesService
 * @package App\Services
 */
class ResponsesService
{
    public static function success($data='',$message = 'success',$status=200,$error=''){
        return [
                'success' => true,
                'status' => $status,
                'error' => $error,
                'message' => $message,
                'data' => $data,
        ];
    }

    public static function error($data='',$message = 'error',$status=400,$error=''){
        return [
            'success' => false,
            'status' => $status,
            'error' => $error,
            'message' => $message,
            'data' => $data,
        ];
    }

    public static function exception($e,$status=500){
        return [
            'success' => false,
            'status' => $status,
            'error' => $e->getMessage(),
            'message' => $e->getMessage(),
            'data' => '',
        ];
    }
}
