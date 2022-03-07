<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($data){
        return $this->userRepository->save($data);
    }

    public function update($data,$id){
        return $this->userRepository->update($data,$id);
    }

    public function findById($id){
        return $this->userRepository->findById($id);
    }

}
