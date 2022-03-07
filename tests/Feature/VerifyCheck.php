<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class VerifyCheck extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $userData = [
            'email' => 'burakerenel@gmail.com',
            'password' => 'burakerenel',
        ];
        $response = $this->json('POST', '/api/v1/login', $userData, ['Accept' => 'application/json'])
            ->assertJsonStructure([
                "token"
            ]);


        $token = $response->getData()->token;

        $this->json('POST', '/api/v1/check-verify', [],
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer: '.$token
            ])
            ->assertStatus(200)
            ->assertJsonStructure([
                "email_verified_at",
                "phone_verified_at"
            ]);
    }
}
