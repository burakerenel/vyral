<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserVerifyCodeResource extends JsonResource
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
            'email_verified_at' => $this->email_verified_at,
            'phone_verified_at' => $this->phone_verified_at
        ];
    }
}
