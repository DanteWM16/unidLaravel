<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;

class CustomException extends Exception {
    protected $code;

    protected $message;

    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function render(Request $request) {
        $response['message'] = $this->message;
        return response()->json($response, $this->code);
    }
}
