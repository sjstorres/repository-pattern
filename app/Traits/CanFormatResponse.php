<?php

namespace App\Traits;

use http\Env\Response;
use Illuminate\Http\JsonResponse;

trait CanFormatResponse
{
    public function success(array $result): JsonResponse
    {
        return response()->json([
            'code'     => '200',
            'message'  => 'Success',
            'result'   => $result
        ]);
    }

    public function created(array $result): JsonResponse
    {
        return response()->json([
            'code'     => '201',
            'message'  => 'Created Entry',
            'result'   => $result
        ]);
    }

}
