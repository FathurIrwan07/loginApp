<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register_successfully()
    {
        Event::fake(); // jika ingin mengabaikan event Registered

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        // Assert user exists in database
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
            'name' => 'Test User',
            'role' => 'user', // role default
        ]);

        // Assert user is authenticated
        $this->assertAuthenticated();

        // Assert redirect
        $response->assertRedirect('/user/dashboard');
    }

    /** @test */
    public function registration_requires_valid_input()
    {
        $response = $this->from('/register')->post('/register', [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'password_confirmation' => 'not-matching',
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $this->assertGuest();
    }

    /** @test */
    public function email_must_be_unique()
    {
        User::factory()->create([
            'email' => 'duplicate@example.com',
        ]);

        $response = $this->from('/register')->post('/register', [
            'name' => 'Another User',
            'email' => 'duplicate@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('email');
    }
}
