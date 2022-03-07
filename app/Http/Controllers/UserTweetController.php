<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTweetEditTweetRequest;
use App\Http\Resources\UserTweetEditTweetResource;
use App\Http\Resources\UserTweetGetTweetsCollection;
use App\Models\User;
use App\Models\UserTweet;
use App\Services\UserCodeService;
use App\Services\UserService;
use App\Services\UserTweetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTweetController extends Controller
{

    protected $userTweetService;

    public function __construct(UserTweetService $userTweetService)
    {
        $this->userTweetService = $userTweetService;
    }


    /**
     * @param $username
     * @return mixed
     */
    public function getTweets($username)
    {
        $userId = Auth::id();
        $tweets = new TwitterController();
        $getMockTweets = $tweets->getMockTweets();

        foreach ($getMockTweets as $key => $feed) {
            if ($feed->username === $username) {
                foreach ($feed->tweets as $tweet) {
                    if (!$this->userTweetService->findByUserIdAndTweetId($userId,$tweet->id)) {
                        $data = [
                            'user_id' => Auth::id(),
                            'tweet_id' => $tweet->id,
                            'tweet_data' => json_encode($tweet),
                            'status' => 'declined',
                        ];
                        $this->userTweetService->create($data);
                    }
                }
                break;
            }
        }
        $userTweets = $this->userTweetService->findByUserId($userId);
        return new UserTweetGetTweetsCollection($userTweets);
    }

    /**
     * @param $id
     * @param UserTweetEditTweetRequest $request
     * @return UserTweetEditTweetResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function editTweet($id, UserTweetEditTweetRequest $request)
    {
        $tweet = $this->userTweetService->findById($id);
        $this->authorize('update', $tweet);
        $this->userTweetService->update($request->all(),$id);
        $data = $this->userTweetService->findById($id);
        return new UserTweetEditTweetResource($data);
    }


}
