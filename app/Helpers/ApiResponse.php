<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success(
        string $message,
        $data = null,
        int $status = 200
    ) {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function error(
        string $message,
        int $status = 500,
        $errors = null
    ) {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
