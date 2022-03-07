<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;


class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserCreateRequest $request)
    {
        $user = $this->userService->create($request->all());
        $token = $user->createToken('appAuthToken')->plainTextToken;
        return response()->json(['message' => 'Registration Successful.', 'token' => $token], 201);
    }

    /**
     * @param UserLoginRequest $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->user()->tokens()->delete();
            $token = $request->user()->createToken("appAuthToken");
            return response()->json(['token' => $token->plainTextToken], 202);
        }
        else{
            return response()->json(['message' => "User information is incorrect."], 203);

        }
    }


}
