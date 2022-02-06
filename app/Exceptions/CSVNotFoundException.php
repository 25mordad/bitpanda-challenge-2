<?php

namespace App\Exceptions;

use Exception;

class CSVNotFoundException extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'CSV file is not found or readable'], 500);
    }
}
