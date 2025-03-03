<x-app-layout>
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Detalles del Usuario</h2>

    <div class="border border-gray-200 rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <tbody>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold">ID</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold">DNI</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->dni }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold">Nombre</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold">Correo</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold">Teléfono</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->telefono }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold">Dirección</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->direccion }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold">Fecha Alta</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->fecha_alta }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left font-semibold">Tipo</th>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->tipo }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ route('users.index') }}" 
           class="bg-blue-500  px-4 py-2 rounded-md hover:bg-blue-600 transition">
            Volver
        </a>
    </div>
</div>
</x-app-layout>
