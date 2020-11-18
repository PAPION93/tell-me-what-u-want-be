<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::factory()->create();
        $response = $this->json('POST', '/api/v1/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $response->dump();
        $response->assertStatus(200);
    }
}
