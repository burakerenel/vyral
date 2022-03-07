<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @var User
     */
    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->user
            ->where('id', $id)
            ->first();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        $user = new $this->user($data);
        $user->save();
        return $user->fresh();
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        $user = $this->user->where('id',$id);
        $user->update($data);
        return $user;
    }



}
