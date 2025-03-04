<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('nombre')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        // Obtener la lista de monedas desde la API
        $response = Http::get("https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json");
        
        if ($response->failed()) {
            return back()->with('error', 'No se pudo obtener la lista de monedas.');
        }
    
        $monedas = $response->json(); // Convertir respuesta en array
    
        return view('clientes.create', compact('monedas')); // Pasar datos a la vista
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
