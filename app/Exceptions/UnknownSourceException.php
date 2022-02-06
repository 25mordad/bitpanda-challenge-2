<?php

namespace App\Exceptions;

use Exception;

class UnknownSourceException extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'Unknown Source'], 500);
    }
}
