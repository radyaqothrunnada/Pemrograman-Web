<?php

namespace app\Traits;
// UNTUK FORMATTING RESPONSE
trait ApiResponseFormatter{
    public function apiResponse($code = 200, $message ="success", $data = [])
    {
       // DARI PARAMETER AKAN DI FORRAT MENJADI SEPERTI DIBAWAH INI
       return json_encode ([
        "code" => $code,
        "message" => $message,
        "data" => $data 
    ]);
    }

}

