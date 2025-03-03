<x-app-layout>
    @if($tareas->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            No hay tareas registradas.
        </div>
    @else
        <div class="container mx-auto p-6">
            <h2 class="text-3xl font-semibold mb-6 text-gray-800">Tareas</h2>

            @if (Auth::user()->tipo === 'Administrador')
                <div class="flex justify-end mb-4 space-x-2">
                    <a href="{{ route('tareas.index') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded transition">
                        Todas las Tareas
                    </a>
                    <a href="{{ route('tareas.index', ['filtro' => 'pendientes']) }}" class="bg-yellow-500 hover:bg-yellow-700 font-bold py-2 px-4 rounded transition">
                        Tareas Pendientes de Aprobación
                    </a>
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('tareas.create') }}" class="bg-green-500 hover:bg-green-700 font-bold py-2 px-4 rounded transition">
                    + Crear Tarea
                </a>
            </div>

            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full border-collapse">
                    <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                        <tr>
                            <th class="py-3 px-4 text-left">ID</th>
                            <th class="py-3 px-4 text-left">Cliente</th>
                            <th class="py-3 px-4 text-left">Descripción</th>
                            <th class="py-3 px-4 text-left">Estado</th>
                            <th class="py-3 px-4 text-left">Operario</th>
                            <th class="py-3 px-4 text-left">Fecha Realización</th>
                            <th class="py-3 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($tareas as $tarea)
                        <tr class="border-b even:bg-gray-50">
                            <td class="py-3 px-4">{{ $tarea->id_tarea }}</td>
                            <td class="py-3 px-4">{{ $tarea->cliente->nombre }}</td>
                            <td class="py-3 px-4">{{ $tarea->descripcion }}</td>
                            <td class="py-3 px-4">
                                @if($tarea->estado == 'P')
                                    <span class="bg-yellow-300 text-yellow-900 text-xs font-semibold px-2 py-1 rounded">Pendiente</span>
                                @elseif($tarea->estado == 'R')
                                    <span class="bg-green-500 text-xs font-semibold px-2 py-1 rounded">Realizada</span>
                                @elseif($tarea->estado == 'C')
                                    <span class="bg-red-500 text-xs font-semibold px-2 py-1 rounded">Cancelada</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">{{ $tarea->operario->name }}</td>
                            <td class="py-3 px-4">{{ $tarea->fecha_realizacion }}</td>
                            <td class="py-3 px-4 flex justify-center space-x-2">
                                <a href="{{ route('tareas.show', $tarea->id_tarea) }}" class="bg-blue-500 hover:bg-blue-700 text-sm font-medium px-3 py-1 rounded transition">
                                    👁 Ver
                                </a>
                                <a href="{{ route('tareas.edit', $tarea->id_tarea) }}" class="bg-indigo-500 hover:bg-indigo-700 text-sm font-medium px-3 py-1 rounded transition">
                                    ✏ Editar
                                </a>
                                <form action="{{ route('tareas.destroy', $tarea->id_tarea) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-sm font-medium px-3 py-1 rounded transition" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                                        🗑 Eliminar
                                    </button>
                                </form>
                                @if($tarea->estado == 'P')
                                    <form action="{{ route('tareas.cancel', $tarea->id_tarea) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-sm font-medium px-3 py-1 rounded transition">
                                            ❌ Cancelar
                                        </button>
                                    </form>
                                    <form action="{{ route('tareas.realize', $tarea->id_tarea) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-sm font-medium px-3 py-1 rounded transition">
                                            ✔ Realizar
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-center space-x-2 mt-6">
                @if($tareas->currentPage() > 1)
                    <a href="{{ $tareas->previousPageUrl() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded transition">
                        &laquo; Anterior
                    </a>
                @endif
                
                @for($i = 1; $i <= $tareas->lastPage(); $i++)
                    <a href="{{ $tareas->url($i) }}" class="px-4 py-2 rounded transition 
                       {{ $i == $tareas->currentPage() ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }}">
                        {{ $i }}
                    </a>
                @endfor
                
                @if($tareas->hasMorePages())
                    <a href="{{ $tareas->nextPageUrl() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded transition">
                        Siguiente &raquo;
                    </a>
                @endif
            </div>
        </div>
    @endif
</x-app-layout>
