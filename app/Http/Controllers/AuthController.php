<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use JetBrains\PhpStorm\ArrayShape;

class AuthController extends Controller
{
    #[ArrayShape(["user" => User::class, "token" => "string"])]
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse|array
    {
        if (!auth()->attempt($request->validated())) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = auth()->user();

        return [
            "user" => $user,
            "token" => $user->createApiToken()
        ];
    }

    /**
     * @param RegisterRequest $request
     * @return array
     */
    #[ArrayShape(["user" => User::class, "token" => "string"])]
    public function register(RegisterRequest $request): array
    {
        $user = User::create($request->validated());

        return $this->respondWithToken($user);
    }

    #[ArrayShape(["user" => User::class, "token" => "string"])]
    public function respondWithToken($user): array
    {
        return [
            "user" => $user,
            "token" => $user->createApiToken()
        ];
    }
}
