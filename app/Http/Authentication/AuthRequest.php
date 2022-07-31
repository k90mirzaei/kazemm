<?php

namespace App\Http\Authentication;

use Laravel\Passport\Client as OClient;
use Symfony\Component\HttpFoundation\Request;

class AuthRequest
{
    public function grantPasswordToken(array $params)
    {
        $params = [
            'grant_type' => 'password',
            'username' => $params['email'],
            'password' => $params['password'],
        ];

        return $this->makePostRequest($params);
    }

    public function refreshAccessToken()
    {
        $refreshToken = request()->cookie('xsrf_https');

        abort_unless($refreshToken, 403, 'Your refresh token is expired.');

        $params = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
        ];

        return $this->makePostRequest($params);
    }

    /**
     * @throws \Exception
     */
    protected function makePostRequest(array $params)
    {
        $oClient = OClient::where('name', 'users')->first();

        $params = array_merge([
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
        ], $params);

        $proxy = Request::create('oauth/token', 'post', $params);
        $response = json_decode(app()->handle($proxy)->getContent());

        if (!isset($response->refresh_token))
            throw new \Exception('Internal Error!');

        $this->setHttpOnlyCookie($response->refresh_token);

        return $response;
    }

    protected function setHttpOnlyCookie(string $refreshToken): void
    {
        setcookie(
            'xsrf_https',
            $refreshToken,
            time() + 3 * 24 * 60 * 60,
            '/',
            '',
            false,
            true
        );
    }
}
