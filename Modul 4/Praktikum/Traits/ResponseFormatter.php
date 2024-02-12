<?php

namespace Traits;

// Disimulasikan ini trait untuk formatter JSON Response
trait ResponseFormatter
{
    public function responseFormatter($code, $message, $data = null) {
        return json_encode([
            "code" => $code,
            "message" => $message,
            "data" => $data
        ]);
    }
}