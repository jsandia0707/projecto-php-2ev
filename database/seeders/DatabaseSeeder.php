<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario con un password específico
        /*User::factory()->create([
            'dni' => '12345678A',
            'name' => 'Usuario 1',
            'email' => 'usuario1@gmail.com',
            'telefono' => '123456789',
            'direccion' => 'Calle Ejemplo, 123',
            'fecha_alta' => now(),
            'tipo' => 'Operario',
            'password' => Hash::make('usuario1'), // Cifrado con Bcrypt
        ]);*/
        $this->call([
            RolePermissionSeeder::class,
        ]);
    }
}
