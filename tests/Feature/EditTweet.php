<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditTweet extends TestCase
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
            "tweet_data" => [
                'id' => 1,
                'user_id' => 1,
                'content' => "Voluptatem aut nulla consequatur qui. Incidunt harum laborum soluta minima.",
                'created_at' => 1646563084,
            ],
            "status" => "published"
        ];
        $this->json('POST', '/api/v1/edit-tweet/1', $codeData,
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer: ' . $token
            ])
            ->assertStatus(200);
    }
}
