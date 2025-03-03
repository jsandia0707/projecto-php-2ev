<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Crear Cliente</h2>
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
        <form action="{{ route('clientes.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="cif" class="block text-gray-700 font-semibold mb-2">CIF</label>
                <input type="text" name="cif" id="cif" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('cif') border-red-500 @enderror" value="{{ old('cif') }}">
                @error('cif')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('nombre') border-red-500 @enderror" value="{{ old('nombre') }}">
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="telefono" class="block text-gray-700 font-semibold mb-2">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('telefono') border-red-500 @enderror" value="{{ old('telefono') }}">
                @error('telefono')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="correo" class="block text-gray-700 font-semibold mb-2">Correo</label>
                <input type="email" name="correo" id="correo" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('correo') border-red-500 @enderror" value="{{ old('correo') }}">
                @error('correo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="cuenta_corriente" class="block text-gray-700 font-semibold mb-2">Cuenta Corriente</label>
                <input type="text" name="cuenta_corriente" id="cuenta_corriente" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('cuenta_corriente') border-red-500 @enderror" value="{{ old('cuenta_corriente') }}">
                @error('cuenta_corriente')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="pais" class="block text-gray-700 font-semibold mb-2">País</label>
                <input type="text" name="pais" id="pais" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('pais') border-red-500 @enderror" value="{{ old('pais') }}">
                @error('pais')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="moneda" class="block text-gray-700 font-semibold mb-2">Moneda</label>
                <input type="text" name="moneda" id="moneda" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('moneda') border-red-500 @enderror" value="{{ old('moneda') }}">
                @error('moneda')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="importe_cuota" class="block text-gray-700 font-semibold mb-2">Importe Cuota</label>
                <input type="number" name="importe_cuota" id="importe_cuota" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('importe_cuota') border-red-500 @enderror" value="{{ old('importe_cuota') }}">
                @error('importe_cuota')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Crear Cliente
                </button>
                <a href="{{ route('clientes.index') }}" class="ml-4 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
