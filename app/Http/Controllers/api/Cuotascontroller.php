<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cuota;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CuotasController extends Controller
{
    public function index()
    {
        $cuotas = Cuota::orderBy('fecha_emision', 'desc')->paginate(10);
        return response()->json($cuotas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'concepto' => 'required',
            'fecha_emision' => 'required|date',
            'importe' => 'required|numeric',
            'pagada' => 'required|in:S,N',
            'fecha_pago' => 'nullable|date',
            'notas' => 'nullable|string'
        ]);

        $cuota = Cuota::create($request->all());
        return response()->json($cuota, 201);
    }

    public function show($id)
    {
        $cuota = Cuota::with('cliente')->findOrFail($id);
        return response()->json($cuota);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_cliente' => 'required',
            'concepto' => 'required',
            'fecha_emision' => 'required|date',
            'importe' => 'required|numeric',
            'pagada' => 'required|in:S,N',
            'fecha_pago' => 'nullable|date',
            'notas' => 'nullable|string'
        ]);

        $cuota = Cuota::findOrFail($id);
        $cuota->update($request->all());
        return response()->json($cuota);
    }

    public function destroy($id)
    {
        $cuota = Cuota::findOrFail($id);
        $cuota->delete();
        return response()->json(null, 204);
    }

    public function markAsPaid($id, Request $request)
    {
        $request->validate([
            'fecha_pago' => 'required|date'
        ]);

        $cuota = Cuota::findOrFail($id);
        $cuota->update([
            'pagada' => 'S',
            'fecha_pago' => $request->fecha_pago
        ]);

        return response()->json($cuota);
    }

    public function getCuotasPendientes()
    {
        $cuotas = Cuota::where('pagada', 'N')->orderBy('fecha_emision')->paginate(10);
        return response()->json($cuotas);
    }

    public function cuotasPorCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cuotas = Cuota::where('id_cliente', $id)->paginate(10);
        return response()->json(['cliente' => $cliente, 'cuotas' => $cuotas]);
    }
}
