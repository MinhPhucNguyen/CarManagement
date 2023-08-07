<?php

namespace App\Traits;

trait HttpResponses
{
    protected function success($data, $message = null, $status = 200)
    {
        return response()->json([
            'status' => "Request thành công",
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    protected function error($data, $message = null, $status)
    {
        return response()->json([
            'status' => "Request thất bại",
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
