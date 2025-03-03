<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Crear Usuario</h2>
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
        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="dni" class="block text-gray-700 font-semibold mb-2">DNI</label>
                <input type="text" name="dni" id="dni" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('dni') border-red-500 @enderror" value="{{ old('dni') }}">
                @error('dni')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Correo</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
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
                <label for="direccion" class="block text-gray-700 font-semibold mb-2">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('direccion') border-red-500 @enderror" value="{{ old('direccion') }}">
                @error('direccion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="tipo" class="block text-gray-700 font-semibold mb-2">Tipo</label>
                <select name="tipo" id="tipo" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('tipo') border-red-500 @enderror">
                    <option value="Operario" {{ old('tipo') == 'Operario' ? 'selected' : '' }}>Operario</option>
                    <option value="Administrador" {{ old('tipo') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                </select>
                @error('tipo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('password') border-red-500 @enderror" value="{{ old('password') }}">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-green-600 hover:bg-green-700  font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Crear Usuario
                </button>
                <a href="{{ route('users.index') }}" class="ml-4 bg-gray-600 hover:bg-gray-700  font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
