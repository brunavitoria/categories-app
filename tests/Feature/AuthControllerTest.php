<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_it_can_register_a_new_user()
    {
        $response = $this->postJson('/api/register', [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'access_token',
                'token_type'
            ]);
    }

    #[Test]
    public function it_can_login_a_user()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'access_token',
                'token_type'
            ]);
    }

    #[Test]
    public function it_can_logout_a_user()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/logout', [], [
            'Authorization' => 'Bearer ' . $user->createToken('test-token')->plainTextToken
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message'
            ]);
    }

    #[Test]
    public function it_can_check_if_a_user_is_logged_in()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->getJson('/api/user', [
            'Authorization' => 'Bearer ' . $user->createToken('test-token')->plainTextToken
        ]);

        $response->assertStatus(200);
    }
        
}
