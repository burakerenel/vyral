<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserCode;
use App\Repositories\UserCodeRepository;
use Illuminate\Support\Facades\Auth;

class UserCodeService
{

    /**
     * @var UserCodeRepository
     */
    protected $userCodeRepository;

    /**
     * @param UserCodeRepository $userCodeRepository
     */
    public function __construct(UserCodeRepository $userCodeRepository)
    {
        $this->userCodeRepository = $userCodeRepository;
    }

    public function create($data){
        $data['user_id'] =  Auth::id();
        $data['code'] =  User::createCode();
        return $this->userCodeRepository->save($data);
    }



}
