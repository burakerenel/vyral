<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreate extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_register()
    {
        $user = User::factory()->make();
//        $userData = [
//            'full_name' => $user->full_name,
//            'email' => $user->email,
//            'twitter_username' => $user->twitter_username,
//            'password' => $user->password,
//            'phone' => $user->phone,
//        ];

        $userData = [
            'full_name' => "Burak Erenel",
            'email' => "burakerenel@gmail.com",
            'twitter_username' => "Minnie.Lind",
            'password' => "burakerenel",
            'phone' => "05355555555",
        ];
        $this->json('POST', '/api/v1/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "message"
            ]);
    }
}
