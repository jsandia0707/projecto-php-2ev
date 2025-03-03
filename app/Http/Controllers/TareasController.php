<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TareasController extends Controller
{
    public function reglasTareas(): array
    {
        return [
            'id_cliente' => 'required',
            'persona_contacto' => 'required',
            'telefono_contacto' => ['required', 'regex:/^[0-9]{9}$/'],
            'correo_contacto' => ['required', 'email'],
            'direccion' => 'required',
            'poblacion' => 'required',
            'codigo_postal' => ['required', 'regex:/^[0-9]{5}$/'],
            'provincia' => 'required',
            'estado' => ['required', Rule::in(['P', 'R', 'C'])],
            'fecha_realizacion' => 'required|date|after_or_equal:today',
            'anotaciones_anteriores' => 'nullable|string',
            'anotaciones_posteriores' => 'nullable|string',
        ];
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Tarea::query();

        if ($user->tipo === 'Operario') {
            $query->where('operario_encargado', $user->id)
                  ->where('estado', '!=', 'C');
        }

        if ($request->has('filtro') && $request->filtro === 'pendientes') {
            $query->where('estado', 'P');
        }

        $tareas = $query->orderBy('fecha_realizacion', 'desc')->paginate(10);

        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $provincias = Provincia::orderBy('nombre')->get();
        $operarios = User::where('tipo', 'operario')->orderBy('name')->get();
        return view('tareas.create', compact('clientes', 'provincias', 'operarios'));
    }

    public function store(Request $request)
    {
        $request->validate($this->reglasTareas());
        Tarea::create($request->all());
        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente');
    }

    public function show($id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.show', compact('tarea'));
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $clientes = Cliente::orderBy('nombre')->get();
        $provincias = Provincia::orderBy('nombre')->get();
        $operarios = User::where('tipo', 'operario')->orderBy('name')->get();
        return view('tareas.edit', compact('tarea', 'clientes', 'provincias', 'operarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->reglasTareas());
        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->all());
        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente');
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente');
    }

    public function Tareas_X_Usuarios($id)
    {
        $tareas = Tarea::where('operario_encargado', $id)->paginate(10);
        return view('tareas.index', compact('tareas'));
    }

    public function Tareas_X_Clientes($id)
    {
        $tareas = Tarea::where('id_cliente', $id)->paginate(10);
        return view('tareas.index', compact('tareas'));
    }
    public function cancel($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->estado = 'C';
        $tarea->save();

        return redirect()->route('tareas.index')->with('success', 'Tarea cancelada correctamente');
    }

    public function realize($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->estado = 'R';
        $tarea->save();

        return redirect()->route('tareas.index')->with('success', 'Tarea realizada correctamente');
    }
}
