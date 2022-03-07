<?php

namespace App\Services;

use App\Repositories\UserTweetRepository;
use Illuminate\Support\Facades\Auth;

class UserTweetService
{

    /**
     * @var UserTweetRepository
     */
    protected $userTweetRepository;

    /**
     * @param UserTweetRepository $userTweetRepository
     */
    public function __construct(UserTweetRepository $userTweetRepository)
    {
        $this->userTweetRepository = $userTweetRepository;
    }

    public function create($data){
        return $this->userTweetRepository->save($data);
    }

    public function update($data,$id){
        return $this->userTweetRepository->update($data,$id);
    }

    public function findById($id){
        return $this->userTweetRepository->findById($id);
    }

    public function findByUserIdAndTweetId($userId,$tweetId){
        return $this->userTweetRepository->findByUserIdAndTweetId($userId,$tweetId);
    }

    public function findByUserId($id){
        return $this->userTweetRepository->findByUserId($id);
    }

}
