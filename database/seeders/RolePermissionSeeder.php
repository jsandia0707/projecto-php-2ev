<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'Administrador']);
        $operarioRole = Role::create(['name' => 'Operario']);

        // Crear permisos
        Permission::create(['name' => 'view tasks']);
        Permission::create(['name' => 'manage tasks']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage clients']);
        Permission::create(['name' => 'manage quotas']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo(Permission::all());
        $operarioRole->givePermissionTo(['view tasks', 'manage tasks']);

        $user = User::find(1); // Asegúrate de que el usuario con ID 1 existe
        $user->assignRole($adminRole);
    }
}