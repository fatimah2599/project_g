<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses
{

    // public function sendResponse(
    //     array $args = []
    // ): JsonResponse {
    //     $response = array_merge([
    //         'status' => http_response_code(),
    //         'isSuccess' => true,
    //         'message' => "Action Successful",
    //         'data' => [],
    //         'code' => "SUCCESS",
    //     ], $args);

    //     return response()->json(
    //         $response,
    //         $response['status']
    //     );
    // }

    ///
    public function sendResponse($args): JsonResponse {
        $response = array_merge([
            'status' => http_response_code(),
            'isSuccess' => true,
            'message' => "Action Successful",
            'data' => [],
            'code' => "SUCCESS",
        ], (array) $args);

        return response()->json(
            $response,
            $response['status']
        );
    }

}
