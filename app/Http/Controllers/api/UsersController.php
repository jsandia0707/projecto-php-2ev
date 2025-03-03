<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);
        return response()->json($users);
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
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
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
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }

    public function degrade($id)
    {
        $user = User::findOrFail($id);
        if ($user->tipo == 'Administrador') {
            $user->tipo = 'Operario';
            $user->save();
        }

        return response()->json($user);
    }

    public function promote($id)
    {
        $user = User::findOrFail($id);
        if ($user->tipo == 'Operario') {
            $user->tipo = 'Administrador';
            $user->save();
        }

        return response()->json($user);
    }
}