<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class UnauthorizedAccessException extends Exception
{
    public function render(Request $request)
    {
        return redirect()->route('home'); // Przekierowanie do konkretnej ścieżki, np. 'home'
    }
}
