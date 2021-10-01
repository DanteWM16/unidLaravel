<?php

namespace App\Exceptions;

use Exception;

class InvalidRequestException extends Exception
{
    protected $code;

    protected $message;

    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function render() {
        $response['message'] = $this->message;
        return response()->json($response, $this->code);
    }
}
