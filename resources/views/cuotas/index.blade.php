<x-app-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Cuotas</h2>

        <div class="flex justify-end mb-4">
            <a href="{{ route('cuotas.create') }}" class="bg-green-500 hover:bg-green-700 font-bold py-2 px-4 rounded transition">
                + Crear Cuota
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Cliente</th>
                        <th class="py-3 px-4 text-left">Concepto</th>
                        <th class="py-3 px-4 text-left">Importe</th>
                        <th class="py-3 px-4 text-left">Pagada</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($cuotas as $cuota)
                    <tr class="border-b even:bg-gray-50">
                        <td class="py-3 px-4">{{ $cuota->id_cuota }}</td>
                        <td class="py-3 px-4">{{ $cuota->cliente->nombre }}</td>
                        <td class="py-3 px-4">{{ $cuota->concepto }}</td>
                        <td class="py-3 px-4">{{ $cuota->importe }}</td>
                        <td class="py-3 px-4">{{ $cuota->pagada == 'S' ? 'Sí' : 'No' }}</td>
                        <td class="py-3 px-4 flex justify-center space-x-2">
                            <a href="{{ route('cuotas.show', $cuota->id_cuota) }}" class="bg-blue-500 hover:bg-blue-700 text-sm font-medium px-3 py-1 rounded transition">
                                👁 Ver
                            </a>
                            <a href="{{ route('cuotas.edit', $cuota->id_cuota) }}" class="bg-indigo-500 hover:bg-indigo-700 text-sm font-medium px-3 py-1 rounded transition">
                                ✏ Editar
                            </a>
                            <form action="{{ route('cuotas.destroy', $cuota->id_cuota) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-sm font-medium px-3 py-1 rounded transition" onclick="return confirm('¿Estás seguro de eliminar esta cuota?')">
                                    🗑 Eliminar
                                </button>
                            </form>
                            @if ($cuota->pagada == 'N')
                                <form action="{{ route('cuotas.markAsPaid', $cuota->id_cuota) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-sm font-medium px-3 py-1 rounded transition">
                                        Marcar como Pagada
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
            @if($cuotas->currentPage() > 1)
                <a href="{{ $cuotas->previousPageUrl() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded transition">
                    &laquo; Anterior
                </a>
            @endif
            
            @for($i = 1; $i <= $cuotas->lastPage(); $i++)
                <a href="{{ $cuotas->url($i) }}" class="px-4 py-2 rounded transition 
                   {{ $i == $cuotas->currentPage() ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }}">
                    {{ $i }}
                </a>
            @endfor
            
            @if($cuotas->hasMorePages())
                <a href="{{ $cuotas->nextPageUrl() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded transition">
                    Siguiente &raquo;
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
