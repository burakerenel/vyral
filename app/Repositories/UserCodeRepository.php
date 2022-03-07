<?php

namespace App\Repositories;

use App\Models\UserCode;

class UserCodeRepository
{
    /**
     * @var UserCode
     */
    protected $userCode;


    public function __construct(UserCode $userCode)
    {
        $this->userCode = $userCode;
    }

    public function save($data)
    {
        $userCode = new $this->userCode($data);
        $userCode->save();
        return $userCode->fresh();
    }

}
