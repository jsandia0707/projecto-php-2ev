<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class TareasInertiaController extends Controller
{
    public function create()
    {
        return Inertia::render('CreateTask');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'persona_contacto' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'correo_contacto' => 'required|email|exists:clientes,correo',
            'direccion' => 'required|string',
            'poblacion' => 'required|string',
            'codigo_postal' => 'required|string|max:10',
            'provincia' => 'required|string',
            'anotaciones_antes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Tarea::create([
            'id_cliente' => $request->id_cliente,
            'persona_contacto' => $request->persona_contacto,
            'descripcion' => $request->descripcion,
            'correo_contacto' => $request->correo_contacto,
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'codigo_postal' => $request->codigo_postal,
            'provincia' => $request->provincia,
            'anotaciones_anteriores' => $request->anotaciones_antes,
            'fecha_creacion' => now(),
            'estado' => 'P', // Pendiente de aprobación
        ]);

        return redirect()->route('tasks.create')->with('success', 'Tarea creada correctamente');
    }
}