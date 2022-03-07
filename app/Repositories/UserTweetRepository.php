<?php

namespace App\Repositories;

use App\Models\UserTweet;

class UserTweetRepository
{
    /**
     * @var UserTweet
     */
    protected $userTweet;


    public function __construct(UserTweet $userTweet)
    {
        $this->userTweet = $userTweet;
    }

    public function findById($id)
    {
        return $this->userTweet
            ->where('id', $id)
            ->first();
    }

    public function findByUserIdAndTweetId($userId,$tweetId)
    {
        return $this->userTweet
            ->where('user_id', $userId)
            ->where('tweet_id', $tweetId)
            ->first();
    }

    public function findByUserId($id)
    {
        return $this->userTweet->where('user_id', $id)->orderBy('created_at','desc')->paginate(20);
    }


    public function save($data)
    {
        $userTweet = new $this->userTweet($data);
        $userTweet->save();
        return $userTweet->fresh();
    }

    public function update($data, $id)
    {
        $userTweet = $this->userTweet->where('id',$id);
        $userTweet->update($data);
        return $userTweet;
    }

}
