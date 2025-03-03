<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('nombre')->paginate(10);
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cif' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'cuenta_corriente' => 'required',
            'pais' => 'required',
            'moneda' => 'required',
            'importe_cuota' => 'required|numeric'
        ]);

        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cif' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'cuenta_corriente' => 'required',
            'pais' => 'required',
            'moneda' => 'required',
            'importe_cuota' => 'required|numeric'
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json(null, 204);
    }
}