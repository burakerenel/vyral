<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCodeVerifyRequest;
use App\Http\Requests\UserSendVerifyCodeRequest;
use App\Http\Resources\UserVerifyCodeResource;
use App\Jobs\SendUserCodeJob;
use App\Models\UserCode;
use App\Services\UserCodeService;
use App\Services\UserService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserCodeController extends Controller
{

    protected $userCodeService;
    protected $userService;

    public function __construct(UserCodeService $userCodeService,UserService $userService)
    {
        $this->userCodeService = $userCodeService;
        $this->userService = $userService;
    }

    /**
     * @return UserVerifyCodeResource
     */
    public function checkVerify()
    {
        return new UserVerifyCodeResource(Auth::user());
    }


    /**
     * @param UserSendVerifyCodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendCode(UserSendVerifyCodeRequest $request)
    {
        $this->userCodeService->create($request->all());
        SendUserCodeJob::dispatch($request->user());
        return response()->json(['message' => 'Code sent.'], 200);
    }


    /**
     * @param UserCodeVerifyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyCode(UserCodeVerifyRequest $request)
    {
        $user = $this->userService->findById(Auth::id());
        if ($request->type === UserCode::TYPE_MAIL && isset($user->email_verified_at)) {
            return response()->json(['message' => 'Already validated.'], 201);
        } elseif ($request->type === UserCode::TYPE_PHONE && isset($user->phone_verified_at)) {
            return response()->json(['message' => 'Already validated.'], 201);
        }
        $user->codeType = $request->type;
        if ($user->getUserCode === $request->code) {
            $data = [];
            if ($request->type === UserCode::TYPE_MAIL) {
                $data['email_verified_at'] = Carbon::now();
            } elseif ($request->type === UserCode::TYPE_PHONE) {
                $data['phone_verified_at'] = Carbon::now();
            }
            $this->userService->update($data,Auth::id());
            return response()->json(['message' => 'Validation Successful.'], 201);
        } else {
            return response()->json(['message' => "Wrong code."], 203);
        }
    }
}
