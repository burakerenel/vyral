<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLogin extends TestCase
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
        $this->json('POST', '/api/v1/login', $userData, ['Accept' => 'application/json'])
            ->assertJsonStructure([
                "token"
            ]);
    }
}
