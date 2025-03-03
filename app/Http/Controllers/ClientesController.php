<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('nombre')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
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

        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
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
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }
}
