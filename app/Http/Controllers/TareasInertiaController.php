<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class TareasInertiaController extends Controller
{
    public function create()
    {
        $provincias = Provincia::orderBy('nombre')->get(['cod', 'nombre']);
        return Inertia::render('CreateTask', [
            'provincias' => $provincias,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // ... otras validaciones ...
            'provincia' => 'required|exists:tbl_provincias,cod',
            // ... otras validaciones ...
        ]);

        if ($validator->fails()) {
            $provincias = Provincia::orderBy('nombre')->get(['cod', 'nombre']);
            return Inertia::render('CreateTask', [
                'errors' => $validator->errors(),
                'provincias' => $provincias,
            ])->withViewData(['errors' => $validator->errors()]);
        }


        Tarea::create([
            'id_cliente' => $request->id_cliente,
            'persona_contacto' => $request->persona_contacto,
            'telefono_contacto'=> $request->telefono_contacto,
            'descripcion' => $request->descripcion,
            'correo_contacto' => $request->correo_contacto,
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'codigo_postal' => $request->codigo_postal,
            'provincia' => $request->provincia,
            'anotaciones_antes' => $request->anotaciones_antes,
            'fecha_creacion' => now(),
            'estado' => 'P', // Pendiente de aprobación
        ]);

        return Inertia::render('CreateTask', [
            'message' => 'Tarea creada correctamente'
        ]);
    }
}
