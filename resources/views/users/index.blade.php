<x-app-layout>
    @if($users->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            No hay usuarios registrados.
        </div>
    @else
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Usuarios</h2>

        <div class="flex justify-end mb-4">
            <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 font-bold py-2 px-4 rounded transition">
                + Crear Usuario
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">DNI</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Teléfono</th>
                        <th class="py-3 px-4 text-left">Fecha Alta</th>
                        <th class="py-3 px-4 text-left">Tipo</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($users as $user)
                    <tr class="border-b even:bg-gray-50">
                        <td class="py-3 px-4">{{ $user->id }}</td>
                        <td class="py-3 px-4">{{ $user->dni }}</td>
                        <td class="py-3 px-4">{{ $user->name }}</td>
                        <td class="py-3 px-4">{{ $user->telefono }}</td>
                        <td class="py-3 px-4">{{ $user->fecha_alta }}</td>
                        <td class="py-3 px-4">{{ $user->tipo }}</td>
                        <td class="py-3 px-4 flex justify-center space-x-2">
                            <a href="{{ route('users.show', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-sm font-medium px-3 py-1 rounded transition">
                                👁 Ver
                            </a>
                            <a href="{{ route('tareas.user', $user->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-sm font-medium px-3 py-1 rounded transition">
                                Tareas Relacionadas
                            </a>
                            @if($user->tipo == 'Administrador')
                                <form action="{{ route('users.degrade', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-sm font-medium px-3 py-1 rounded transition" onclick="return confirm('¿Estás seguro de degradar a este usuario a Operario?')">
                                        ⬇ Degradar
                                    </button>
                                </form>
                            @elseif($user->tipo == 'Operario')
                                <form action="{{ route('users.promote', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-sm font-medium px-3 py-1 rounded transition" onclick="return confirm('¿Estás seguro de ascender a este usuario a Administrador?')">
                                        ⬆ Ascender
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-sm font-medium px-3 py-1 rounded transition" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                    🗑 Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-center space-x-2 mt-6">
            @if($users->currentPage() > 1)
                <a href="{{ $users->previousPageUrl() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded transition">
                    &laquo; Anterior
                </a>
            @endif
            
            @for($i = 1; $i <= $users->lastPage(); $i++)
                <a href="{{ $users->url($i) }}" class="px-4 py-2 rounded transition 
                   {{ $i == $users->currentPage() ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }}">
                    {{ $i }}
                </a>
            @endfor
            
            @if($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded transition">
                    Siguiente &raquo;
                </a>
            @endif
        </div>
    </div>
    @endif
</x-app-layout>
