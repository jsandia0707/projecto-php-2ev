<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function index()
    {
        $tareas = Tarea::orderBy('fecha_realizacion', 'desc')->paginate(10);
        return response()->json($tareas);
    }

    public function store(Request $request)
    {
        $request->validate($this->reglasTareas());
        $tarea = Tarea::create($request->all());
        return response()->json($tarea, 201);
    }

    public function show($id)
    {
        $tarea = Tarea::findOrFail($id);
        return response()->json($tarea);
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->reglasTareas());
        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->all());
        return response()->json($tarea);
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return response()->json(null, 204);
    }

    public function Tareas_X_Usuarios($id)
    {
        $tareas = Tarea::where('operario_encargado', $id)->paginate(10);
        return response()->json($tareas);
    }

    public function Tareas_X_Clientes($id)
    {
        $tareas = Tarea::where('id_cliente', $id)->paginate(10);
        return response()->json($tareas);
    }

    public function cancel($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->estado = 'C';
        $tarea->save();

        return response()->json($tarea);
    }

    public function realize($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->estado = 'R';
        $tarea->save();

        return response()->json($tarea);
    }
}