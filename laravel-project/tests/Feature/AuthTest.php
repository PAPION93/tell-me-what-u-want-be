<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    /** @test  */
    public function register()
    {
        $this->json('POST', '/api/v1/register', [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ])
        ->assertOk()
        ->assertJsonStructure([
            'status',
            'data',
        ]);
    }

    /** @test */
    public function login()
    {
        $user = User::factory()->create();
        $response = $this->json('POST', '/api/v1/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'access_token',
                    'token_type',
                    'expires_in',
                ]);
    }

    /** @test */
    public function refresh()
    {
        $user = User::factory()->create();
        $response = $this->json('POST', '/api/v1/login', [
            'email' => $user->email,
            'password' => 'password',
        ])
        ->assertStatus(200);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $response['access_token'],
        ])->json('POST', '/api/v1/refresh', []);
        $response->dump();
        $response->assertStatus(200);
    }
}
