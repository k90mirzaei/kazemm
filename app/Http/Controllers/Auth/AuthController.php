<?php

namespace App\Http\Controllers\Auth;

use App\Http\Authentication\AuthRequest;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected AuthRequest $authRequest;

    public function __construct(AuthRequest $authRequest)
    {
        $this->authRequest = $authRequest;
    }
}
