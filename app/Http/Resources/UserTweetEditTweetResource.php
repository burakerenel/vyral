<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTweetEditTweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'tweet_id' => $this->tweet_id,
            'tweet_data' => $this->tweet_data,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
