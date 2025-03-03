<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar Tarea</h2>

        <form action="{{ route('tareas.update', $tarea->id_tarea) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="id_cliente" class="block text-gray-700 font-semibold mb-2">Cliente</label>
                    <select name="id_cliente" id="id_cliente" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}" {{ $tarea->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                        @endforeach
                    </select>
                    @error('id_cliente')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="persona_contacto" class="block text-gray-700 font-semibold mb-2">Persona de Contacto</label>
                    <input type="text" name="persona_contacto" id="persona_contacto" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('persona_contacto', $tarea->persona_contacto) }}">
                    @error('persona_contacto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="telefono_contacto" class="block text-gray-700 font-semibold mb-2">Teléfono</label>
                    <input type="text" name="telefono_contacto" id="telefono_contacto" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('telefono_contacto', $tarea->telefono_contacto) }}">
                    @error('telefono_contacto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="correo_contacto" class="block text-gray-700 font-semibold mb-2">Correo Electrónico</label>
                    <input type="email" name="correo_contacto" id="correo_contacto" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('correo_contacto', $tarea->correo_contacto) }}">
                    @error('correo_contacto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="direccion" class="block text-gray-700 font-semibold mb-2">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('direccion', $tarea->direccion) }}">
                @error('direccion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="poblacion" class="block text-gray-700 font-semibold mb-2">Población</label>
                    <input type="text" name="poblacion" id="poblacion" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('poblacion', $tarea->poblacion) }}">
                    @error('poblacion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="codigo_postal" class="block text-gray-700 font-semibold mb-2">Código Postal</label>
                    <input type="text" name="codigo_postal" id="codigo_postal" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('codigo_postal', $tarea->codigo_postal) }}">
                    @error('codigo_postal')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="provincia" class="block text-gray-700 font-semibold mb-2">Provincia</label>
                    <select name="provincia" id="provincia" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                        @foreach($provincias as $provincia)
                        <option value="{{ $provincia->cod }}" {{ $tarea->provincia == $provincia->cod ? 'selected' : '' }}>
                            {{ $provincia->nombre }}
                        </option>
                        @endforeach
                    </select>
                    @error('provincia')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado</label>
                    <select name="estado" id="estado" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                        <option value="P" {{ $tarea->estado == 'P' ? 'selected' : '' }}>Pendiente</option>
                        <option value="R" {{ $tarea->estado == 'R' ? 'selected' : '' }}>Realizada</option>
                        <option value="C" {{ $tarea->estado == 'C' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    @error('estado')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="fecha_realizacion" class="block text-gray-700 font-semibold mb-2">Fecha de Realización</label>
                    <input type="date" name="fecha_realizacion" id="fecha_realizacion" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('fecha_realizacion', $tarea->fecha_realizacion) }}">
                    @error('fecha_realizacion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="anotaciones_anteriores" class="block text-gray-700 font-semibold mb-2">Anotaciones Anteriores</label>
                <textarea name="anotaciones_anteriores" id="anotaciones_anteriores" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">{{ old('anotaciones_anteriores', $tarea->anotaciones_anteriores) }}</textarea>
                @error('anotaciones_anteriores')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="anotaciones_posteriores" class="block text-gray-700 font-semibold mb-2">Anotaciones Posteriores</label>
                <textarea name="anotaciones_posteriores" id="anotaciones_posteriores" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">{{ old('anotaciones_posteriores', $tarea->anotaciones_posteriores) }}</textarea>
                @error('anotaciones_posteriores')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700  font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Guardar Cambios
                </button>
                <a href="{{ route('tareas.index') }}" class="ml-4 bg-gray-600 hover:bg-gray-700  font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>