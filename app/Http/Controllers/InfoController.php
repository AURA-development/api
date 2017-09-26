<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function apiInfo()
    {
        return response()->json([
            'success' => true,
            'info' => 'This API powers the AURA back-end, and is running for prototyping purposes.',
            'ping' => (microtime(true) - LARAVEL_START) * 1000
        ]);
    }
}
