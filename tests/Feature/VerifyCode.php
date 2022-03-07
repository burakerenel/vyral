<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VerifyCode extends TestCase
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

        $codeData = [
            "type" => "phone",
            "code" => 999999
        ];
        $this->json('POST', '/api/v1/verify-code', $codeData,
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer: ' . $token
            ])
            ->assertStatus(203)
            ->assertJsonStructure([
                "message",
            ]);

    }
}
