<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class LoginController extends AuthController
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (!auth()->attempt($request->validated())) {
            return response()->json(["status" => "fail", "message" => __("auth.failed")], 401);
        }

        $response = $this->authRequest->grantPasswordToken($request->all());

        return response()->json([
            "status" => "success",
            'accessToken' => $response->access_token,
            "user" => new UserResource(auth()->user())
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(["status" => "success"]);
    }
}
