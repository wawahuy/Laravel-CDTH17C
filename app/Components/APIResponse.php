<?php

namespace App\Components;


trait APIResponse {

    public function api_success($data){
        return response()->json([
            "status" => 200,
            "data" => $data
        ]);
    }


    public function api_error($message){
        return response()->json([
            "status" => 400,
            "message" => $message
        ]);
    }
}