<?php

namespace App\Controllers;

class ErrorController
{
    public static function notFound($message = 'Page Not Found')
    {
        http_response_code(404);
        view('error', [
            'status' => '404',
            'message' => $message
        ]);
    }
    public static function notAuthorized($message = "You're not authorized to view this page")
    {
        http_response_code(404);
        view('error', [
            'status' => '403',
            'message' => $message
        ]);
    }
}