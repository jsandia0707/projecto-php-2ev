<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientesControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba para obtener la lista de clientes.
     */
    public function test_obtener_lista_de_clientes()
    {
        Cliente::factory()->count(3)->create();

        $response = $this->getJson('/api/clientes');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }

    /**
     * Prueba para crear un nuevo cliente.
     */
    public function test_crear_nuevo_cliente()
    {
        $data = [
            'cif' => 'A12345678',
            'nombre' => 'Empresa S.A.',
            'telefono' => '123456789',
            'correo' => 'empresa@example.com',
            'cuenta_corriente' => 'ES1234567890123456789012',
            'pais' => 'España',
            'moneda' => 'EUR',
            'importe_cuota' => 100.00
        ];

        $response = $this->postJson('/api/clientes', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['correo' => 'empresa@example.com']);
    }

    /**
     * Prueba para obtener un cliente específico.
     */
    public function test_obtener_cliente_especifico()
    {
        $cliente = Cliente::factory()->create();

        $response = $this->getJson("/api/clientes/{$cliente->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['correo' => $cliente->correo]);
    }

    /**
     * Prueba para actualizar un cliente.
     */
    public function test_actualizar_cliente()
    {
        $cliente = Cliente::factory()->create();

        $data = [
            'nombre' => 'Empresa Actualizada S.A.',
            'telefono' => '987654321',
            'correo' => 'empresa_actualizada@example.com',
            'cuenta_corriente' => 'ES9876543210987654321098',
            'pais' => 'España',
            'moneda' => 'EUR',
            'importe_cuota' => 200.00
        ];

        $response = $this->putJson("/api/clientes/{$cliente->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['correo' => 'empresa_actualizada@example.com']);
    }

    /**
     * Prueba para eliminar un cliente.
     */
    public function test_eliminar_cliente()
    {
        $cliente = Cliente::factory()->create();

        $response = $this->deleteJson("/api/clientes/{$cliente->id}");

        $response->assertStatus(204);
    }
}