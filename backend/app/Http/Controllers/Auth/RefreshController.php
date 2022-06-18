<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;

class RefreshController extends AuthController
{
    public function refresh(): JsonResponse
    {
        $response = $this->authRequest->refreshAccessToken();

        return response()->json([
            "status" => "success",
            'accessToken' => $response->access_token,
        ]);
    }
}
