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
                    'token',
                    'token_type',
                    'expires_in',
                ]);
        return $response;
    }

    /** @test */
    public function refresh()
    {
        $response = $this->login();

        $this->withHeaders(['Authorization' => 'Bearer ' . $response['token'], ]);
        $response = $this->json('POST', '/api/v1/refresh', []);
        $response->assertStatus(200)
        ->assertJsonStructure([
            'token',
            'token_type',
            'expires_in',
        ]);
    }

    /** @test */
    public function logout()
    {
        $response = $this->login();
        $this->withHeaders(['Authorization' => 'Bearer ' . $response['token'], ]);
        $response = $this->json('POST', '/api/v1/logout', []);
        $response->assertStatus(200)
        ->assertJson([
            'message' => 'Successfully logged out'
        ]);
    }
}
