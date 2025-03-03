<x-app-layout>
    @if($clientes->isEmpty())
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            No hay clientes registrados.
        </div>
    @else
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Clientes</h2>
        
        <div class="flex justify-end mb-4">
            <a href="{{ route('clientes.create') }}" class="bg-green-500 hover:bg-green-700 font-bold py-2 px-4 rounded transition">
                + Crear Cliente
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">CIF</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Teléfono</th>
                        <th class="py-3 px-4 text-left">País</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($clientes as $cliente)
                    <tr class="border-b even:bg-gray-50">
                        <td class="py-3 px-4">{{ $cliente->id_cliente }}</td>
                        <td class="py-3 px-4">{{ $cliente->cif }}</td>
                        <td class="py-3 px-4">{{ $cliente->nombre }}</td>
                        <td class="py-3 px-4">{{ $cliente->telefono }}</td>
                        <td class="py-3 px-4">{{ $cliente->pais }}</td>
                        <td class="py-3 px-4 flex justify-center space-x-2">
                            <a href="{{ route('clientes.show', $cliente->id_cliente) }}" class="bg-blue-500 hover:bg-blue-700 text-sm font-medium px-3 py-1 rounded transition">
                                👁 Ver
                            </a>
                            <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="bg-indigo-500 hover:bg-indigo-700 text-sm font-medium px-3 py-1 rounded transition">
                                ✏ Editar
                            </a>
                            <a href="{{ route('tareas.clientes', $cliente->id_cliente) }}" class="bg-indigo-500 hover:bg-indigo-700 text-sm font-medium px-3 py-1 rounded transition">
                                Tareas Relacionadas
                            </a>
                            <a href="{{ route('clientes.cuotas', $cliente->id_cliente) }}" class="bg-indigo-500 hover:bg-indigo-700 text-sm font-medium px-3 py-1 rounded transition">
                                Cuotas Relacionadas
                            </a>
                            <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-sm font-medium px-3 py-1 rounded transition" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">
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
            @if($clientes->currentPage() > 1)
                <a href="{{ $clientes->previousPageUrl() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded transition">
                    &laquo; Anterior
                </a>
            @endif
            
            @for($i = 1; $i <= $clientes->lastPage(); $i++)
                <a href="{{ $clientes->url($i) }}" class="px-4 py-2 rounded transition 
                   {{ $i == $clientes->currentPage() ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }}">
                    {{ $i }}
                </a>
            @endfor
            
            @if($clientes->hasMorePages())
                <a href="{{ $clientes->nextPageUrl() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded transition">
                    Siguiente &raquo;
                </a>
            @endif
        </div>
    </div>
    @endif
</x-app-layout>
