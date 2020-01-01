<?php

namespace App\Components;


trait APIResponse {

    public function api_success($data, $message = ''){
        return response()->json([
            "status" => true,
            "message" => $message,
            "data" => $data
        ]);
    }


    public function api_error($message){
        return response()->json([
            "status" => false,
            "message" => $message
        ]);
    }
}