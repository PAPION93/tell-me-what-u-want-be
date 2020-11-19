<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
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
}
