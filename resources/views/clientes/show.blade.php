<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Detalles del Cliente</h2>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['id_cliente'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CIF</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['cif'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['nombre'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['telefono'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['correo'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cuenta Corriente</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['cuenta_corriente'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">País</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['pais'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moneda</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['moneda'] }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cuota Mensual</th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cliente['importe_cuota'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            <a href="{{ route('clientes.index') }}" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Volver
            </a>
        </div>
    </div>
</x-app-layout>
