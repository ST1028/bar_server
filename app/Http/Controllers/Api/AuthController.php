<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return UserResource
     * @throws \Exception
     */
    public function me(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    /**
     * @param AuthLoginRequest $request
     * @return AuthResource
     * @throws AuthenticationException
     */
    public function login(AuthLoginRequest $request): AuthResource
    {
        $account = $request->input('account');
        $password = $request->input('password');
        if (\Auth::attempt(['account' => $account, 'password' => $password])) {
            $user = \Auth::user();
            $token = $user->createToken($user->id)->plainTextToken;
            return new AuthResource((object) ['token' => $token]);
        }
        throw new AuthenticationException();
    }
}
