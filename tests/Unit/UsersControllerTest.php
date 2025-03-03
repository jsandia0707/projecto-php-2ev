<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }

    public function test_store()
    {
        $data = [
            'dni' => '12345678A',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'telefono' => '123456789',
            'direccion' => '123 Main St',
            'tipo' => 'Operario',
            'password' => 'password'
        ];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['email' => 'john@example.com']);
    }

    public function test_show()
    {
        $user = User::factory()->create();

        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['email' => $user->email]);
    }

    public function test_update()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'telefono' => '987654321',
            'direccion' => '456 Main St',
            'tipo' => 'Administrador'
        ];

        $response = $this->putJson("/api/users/{$user->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['email' => 'jane@example.com']);
    }

    public function test_destroy()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(204);
    }
}