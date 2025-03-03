<x-app-layout>
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-semibold mb-6 text-gray-800">Detalles de la Tarea</h2>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <tbody>
                @foreach([
                    'ID' => $tarea->id_tarea,
                    'Cliente' => $tarea->cliente->nombre,
                    'Persona de Contacto' => $tarea->persona_contacto,
                    'Teléfono de Contacto' => $tarea->telefono_contacto,
                    'Descripción' => $tarea->descripcion,
                    'Correo de Contacto' => $tarea->correo_contacto,
                    'Dirección' => $tarea->direccion,
                    'Población' => $tarea->poblacion,
                    'Código Postal' => $tarea->codigo_postal,
                    'Provincia' => $tarea->provincia,
                    'Estado' => $tarea->estado,
                    'Fecha de Creación' => $tarea->created_at,
                    'Operario Encargado' => $tarea->operario->name,
                    'Fecha de Realización' => $tarea->fecha_realizacion,
                    'Anotaciones Anteriores' => $tarea->anotaciones_anteriores,
                    'Anotaciones Posteriores' => $tarea->anotaciones_posteriores
                ] as $campo => $valor)
                <tr class="border-b even:bg-gray-50">
                    <th class="py-3 px-6 bg-gray-100 text-gray-700 text-left font-medium">{{ $campo }}</th>
                    <td class="py-3 px-6 text-gray-800">{{ $valor }}</td>
                </tr>
                @endforeach
                <tr class="border-b even:bg-gray-50">
                    <th class="py-3 px-6 bg-gray-100 text-gray-700 text-left font-medium">Fichero Resumen</th>
                    <td class="py-3 px-6">
                        @if($tarea->fichero_resumen)
                            <a href="{{ asset('storage/tareas/' . $tarea->fichero_resumen) }}" 
                               target="_blank" 
                               class="text-blue-600 hover:text-blue-800 underline">
                                Ver Fichero
                            </a>
                        @else
                            <span class="text-gray-500">No disponible</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        <a href="{{ route('tareas.index') }}" class="px-5 py-2 bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
            Volver
        </a>
    </div>
</div>
</x-app-layout>
