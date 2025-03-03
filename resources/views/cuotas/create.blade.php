<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Crear Cuota</h2>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">¡Ups! Algo salió mal.</strong>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('cuotas.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="id_cliente" class="block text-gray-700 font-semibold mb-2">Cliente</label>
                <select name="id_cliente" id="id_cliente" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('id_cliente') border-red-500 @enderror">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente') == $cliente->id_cliente ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
                @error('id_cliente')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="concepto" class="block text-gray-700 font-semibold mb-2">Concepto</label>
                <input type="text" name="concepto" id="concepto" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('concepto') border-red-500 @enderror" value="{{ old('concepto') }}">
                @error('concepto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="fecha_emision" class="block text-gray-700 font-semibold mb-2">Fecha de Emisión</label>
                    <input type="date" name="fecha_emision" id="fecha_emision" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('fecha_emision') border-red-500 @enderror" value="{{ old('fecha_emision') }}">
                    @error('fecha_emision')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="importe" class="block text-gray-700 font-semibold mb-2">Importe</label>
                    <input type="number" name="importe" id="importe" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('importe') border-red-500 @enderror" value="{{ old('importe') }}">
                    @error('importe')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="pagada" class="block text-gray-700 font-semibold mb-2">¿Pagada?</label>
                <select name="pagada" id="pagada" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('pagada') border-red-500 @enderror">
                    <option value="S" {{ old('pagada') == 'S' ? 'selected' : '' }}>Sí</option>
                    <option value="N" {{ old('pagada') == 'N' ? 'selected' : '' }}>No</option>
                </select>
                @error('pagada')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="fecha_pago" class="block text-gray-700 font-semibold mb-2">Fecha de Pago</label>
                <input type="date" name="fecha_pago" id="fecha_pago" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('fecha_pago') border-red-500 @enderror" value="{{ old('fecha_pago') }}">
                @error('fecha_pago')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="notas" class="block text-gray-700 font-semibold mb-2">Notas</label>
                <textarea name="notas" id="notas" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('notas') border-red-500 @enderror">{{ old('notas') }}</textarea>
                @error('notas')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Crear Cuota
                </button>
                <a href="{{ route('cuotas.index') }}" class="ml-4 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
