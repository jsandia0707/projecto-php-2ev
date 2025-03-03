<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Crear Tarea</h2>
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
        <form action="{{ route('tareas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                    <label for="persona_contacto" class="block text-gray-700 font-semibold mb-2">Persona de Contacto</label>
                    <input type="text" name="persona_contacto" id="persona_contacto" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('persona_contacto') border-red-500 @enderror" value="{{ old('persona_contacto') }}" >
                    @error('persona_contacto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="telefono_contacto" class="block text-gray-700 font-semibold mb-2">Teléfono de Contacto</label>
                    <input type="text" name="telefono_contacto" id="telefono_contacto" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('telefono_contacto') border-red-500 @enderror" value="{{ old('telefono_contacto') }}" >
                    @error('telefono_contacto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="correo_contacto" class="block text-gray-700 font-semibold mb-2">Correo Electrónico de Contacto</label>
                    <input type="email" name="correo_contacto" id="correo_contacto" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('correo_contacto') border-red-500 @enderror" value="{{ old('correo_contacto') }}" >
                    @error('correo_contacto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="direccion" class="block text-gray-700 font-semibold mb-2">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('direccion') border-red-500 @enderror" value="{{ old('direccion') }}" >
                @error('direccion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="poblacion" class="block text-gray-700 font-semibold mb-2">Población</label>
                    <input type="text" name="poblacion" id="poblacion" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('poblacion') border-red-500 @enderror" value="{{ old('poblacion') }}" >
                    @error('poblacion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="codigo_postal" class="block text-gray-700 font-semibold mb-2">Código Postal</label>
                    <input type="text" name="codigo_postal" id="codigo_postal" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('codigo_postal') border-red-500 @enderror" value="{{ old('codigo_postal') }}" >
                    @error('codigo_postal')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="provincia" class="block text-gray-700 font-semibold mb-2">Provincia</label>
                <select name="provincia" id="provincia" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('provincia') border-red-500 @enderror">
                    @foreach($provincias as $provincia)
                        <option value="{{ $provincia->cod }}" {{ old('provincia') == $provincia->cod ? 'selected' : '' }}>{{ $provincia->nombre }}</option>
                    @endforeach
                </select>
                @error('provincia')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado de la Tarea</label>
                <select name="estado" id="estado" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('estado') border-red-500 @enderror">
                    <option value="P" {{ old('estado') == 'P' ? 'selected' : '' }}>Pendiente</option>
                    <option value="R" {{ old('estado') == 'R' ? 'selected' : '' }}>Realizada</option>
                    <option value="C" {{ old('estado') == 'C' ? 'selected' : '' }}>Cancelada</option>
                </select>
                @error('estado')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="fecha_realizacion" class="block text-gray-700 font-semibold mb-2">Fecha de Realización</label>
                <input type="date" name="fecha_realizacion" id="fecha_realizacion" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('fecha_realizacion') border-red-500 @enderror" value="{{ old('fecha_realizacion') }}" >
                @error('fecha_realizacion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="operario_encargado" class="block text-gray-700 font-semibold mb-2">Operario Encargado</label>
                <select name="operario_encargado" id="operario_encargado" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('operario_encargado') border-red-500 @enderror">
                    @foreach($operarios as $operario)
                        <option value="{{ $operario->id }}" {{ old('operario_encargado') == $operario->id ? 'selected' : '' }}>{{ $operario->name }}</option>
                    @endforeach
                </select>
                @error('operario_encargado')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="anotaciones_anteriores" class="block text-gray-700 font-semibold mb-2">Anotaciones Anteriores</label>
                <textarea name="anotaciones_anteriores" id="anotaciones_anteriores" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('anotaciones_anteriores') border-red-500 @enderror">{{ old('anotaciones_anteriores') }}</textarea>
                @error('anotaciones_anteriores')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="anotaciones_posteriores" class="block text-gray-700 font-semibold mb-2">Anotaciones Posteriores</label>
                <textarea name="anotaciones_posteriores" id="anotaciones_posteriores" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('anotaciones_posteriores') border-red-500 @enderror">{{ old('anotaciones_posteriores') }}</textarea>
                @error('anotaciones_posteriores')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="fichero_resumen" class="block text-gray-700 font-semibold mb-2">Fichero Resumen de la Tarea</label>
                <input type="file" name="fichero_resumen" id="fichero_resumen" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 @error('fichero_resumen') border-red-500 @enderror">
                @error('fichero_resumen')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Crear Tarea
                </button>
                <a href="{{ route('tareas.index') }}" class="ml-4 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                    Volver
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
