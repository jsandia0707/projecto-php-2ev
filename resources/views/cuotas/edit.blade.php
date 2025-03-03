<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Editar Cuota</h2>

        <form action="{{ route('cuotas.update', $cuota->id_cuota) }}" method="POST" class="max-w-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="concepto" class="block text-gray-700 text-sm font-bold mb-2">Concepto</label>
                <input type="text" name="concepto" id="concepto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('concepto') border-red-500 @enderror" value="{{ old('concepto', $cuota->concepto) }}" required>
                @error('concepto')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fecha_emision" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Emisión</label>
                <input type="date" name="fecha_emision" id="fecha_emision" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('fecha_emision') border-red-500 @enderror" value="{{ old('fecha_emision', $cuota->fecha_emision) }}" required>
                @error('fecha_emision')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="importe" class="block text-gray-700 text-sm font-bold mb-2">Importe</label>
                <input type="number" name="importe" id="importe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('importe') border-red-500 @enderror" value="{{ old('importe', $cuota->importe) }}" required>
                @error('importe')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pagada" class="block text-gray-700 text-sm font-bold mb-2">¿Pagada?</label>
                <select name="pagada" id="pagada" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('pagada') border-red-500 @enderror">
                    <option value="S" {{ old('pagada', $cuota->pagada) == 'S' ? 'selected' : '' }}>Sí</option>
                    <option value="N" {{ old('pagada', $cuota->pagada) == 'N' ? 'selected' : '' }}>No</option>
                </select>
                @error('pagada')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar Cuota
                </button>
                <a href="{{ route('cuotas.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
