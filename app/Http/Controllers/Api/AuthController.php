<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\OpenApi\RequestBodies\AuthRequestBody;
use App\OpenApi\Responses\AuthTokenResponse;
use App\OpenApi\Responses\UserResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return UserResource
     * @throws \Exception
     */
    #[OpenApi\Operation(tags: ['auth'])]
    #[OpenApi\Response(factory: UserResponse::class)]
    public function me(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    /**
     * @param AuthLoginRequest $request
     * @return AuthResource
     * @throws AuthenticationException
     */
    #[OpenApi\Operation(tags: ['auth'])]
    #[OpenApi\RequestBody(factory: AuthRequestBody::class)]
    #[OpenApi\Response(factory: AuthTokenResponse::class)]
    public function login(AuthLoginRequest $request): AuthResource
    {
        try {
            $loginId = $request->input('login_id');
            $password = $request->input('password');
            if (\Auth::attempt(['login_id' => $loginId, 'password' => $password])) {
                $user = \Auth::user();
                $token = $user->createToken($user->id)->plainTextToken;
                return new AuthResource((object) ['token' => $token]);
            }
            throw new AuthenticationException();
        } catch (\Exception $e) {
            throw new $e;
        }
    }
}
