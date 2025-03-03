<?php
namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CuotasController extends Controller
{
    public function index()
    {
        $cuotas = Cuota::orderBy('fecha_emision', 'desc')->paginate(10);
        return view('cuotas.index', compact('cuotas'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('cuotas.create', compact('clientes'));
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

        Cuota::create($request->all());
        return redirect()->route('cuotas.index')->with('success', 'Cuota creada correctamente');
    }

    public function show($id)
    {
        $cuota = Cuota::with('cliente')->findOrFail($id);
        return view('cuotas.show', compact('cuota'));
    }

    public function edit($id)
    {
        $cuota = Cuota::findOrFail($id);
        $clientes = Cliente::orderBy('nombre')->get();
        return view('cuotas.edit', compact('cuota', 'clientes'));
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
        return redirect()->route('cuotas.index')->with('success', 'Cuota actualizada correctamente');
    }

    public function destroy($id)
    {
        $cuota = Cuota::findOrFail($id);
        $cuota->delete();
        return redirect()->route('cuotas.index')->with('success', 'Cuota eliminada correctamente');
    }

    public function marcarComoPagada($id, Request $request)
    {
        $request->validate([
            'fecha_pago' => 'required|date'
        ]);

        $cuota = Cuota::findOrFail($id);
        $cuota->update([
            'pagada' => 'S',
            'fecha_pago' => $request->fecha_pago
        ]);

        return redirect()->route('cuotas.index')->with('success', 'Cuota marcada como pagada');
    }

    public function getCuotasPendientes()
    {
        $cuotas = Cuota::where('pagada', 'N')->orderBy('fecha_emision')->paginate(10);
        return view('cuotas.index', compact('cuotas'));
    }

    public function markAsPaid($id)
    {
        $cuota = Cuota::findOrFail($id);
        $cuota->pagada = 'S';
        $cuota->fecha_pago = now();
        $cuota->save();

        return redirect()->route('cuotas.show', $cuota->id_cuota)->with('success', 'Cuota marcada como pagada');
    }
    public function generatePDF($id)
    {
        $cuota = Cuota::findOrFail($id);

        $pdf = Pdf::loadView('cuotas.pdf', compact('cuota'));

        return $pdf->download('cuota_' . $cuota->id_cuota . '.pdf');
    }

    public function cuotasPorCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cuotas = Cuota::where('id_cliente', $id)->paginate(10);
        return view('cuotas.index', compact('cuotas', 'cliente'));
    }
}
