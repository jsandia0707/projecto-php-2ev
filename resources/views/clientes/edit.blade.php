<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Editar Cliente</h2>

        <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST" class="max-w-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="cif" class="block text-gray-700 text-sm font-bold mb-2">CIF</label>
                <input type="text" name="cif" id="cif" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('cif') border-red-500 @enderror" value="{{ old('cif', $cliente->cif) }}">
                @error('cif')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') border-red-500 @enderror" value="{{ old('nombre', $cliente->nombre) }}">
                @error('nombre')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telefono') border-red-500 @enderror" value="{{ old('telefono', $cliente->telefono) }}">
                @error('telefono')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo</label>
                <input type="email" name="correo" id="correo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('correo') border-red-500 @enderror" value="{{ old('correo', $cliente->correo) }}">
                @error('correo')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cuenta_corriente" class="block text-gray-700 text-sm font-bold mb-2">Cuenta Corriente</label>
                <input type="text" name="cuenta_corriente" id="cuenta_corriente" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('cuenta_corriente') border-red-500 @enderror" value="{{ old('cuenta_corriente', $cliente->cuenta_corriente) }}">
                @error('cuenta_corriente')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar Cliente
                </button>
                <a href="{{ route('clientes.index') }}" class="bg-gray-500 hover:bg-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
