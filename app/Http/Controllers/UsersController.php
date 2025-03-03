<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function assignRole($userId, $roleName)
    {
        $user = User::findOrFail($userId);
        $role = Role::findByName($roleName);
        $user->assignRole($role);

        return redirect()->route('users.index')->with('success', 'Rol asignado correctamente');
    }
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
            'password' => 'nullable|min:8'
        ]);

        $user = User::findOrFail($id);
        $user->fill($request->except('password'));
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }

    public function degrade($id)
    {
        $user = User::findOrFail($id);
        if ($user->tipo == 'Administrador') {
            $user->tipo = 'Operario';
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'Usuario degradado a Operario');
    }

    public function promote($id)
    {
        $user = User::findOrFail($id);
        if ($user->tipo == 'Operario') {
            $user->tipo = 'Administrador';
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'Usuario ascendido a Administrador');
    }
}
