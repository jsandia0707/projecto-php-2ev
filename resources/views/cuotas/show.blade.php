<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Detalles de la Cuota</h2>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <tbody>
                    <tr class="border-b even:bg-gray-50">
                        <th class="py-3 px-4 bg-gray-100 text-gray-700 text-left font-medium">ID</th>
                        <td class="py-3 px-4">{{ $cuota->id_cuota }}</td>
                    </tr>
                    <tr class="border-b even:bg-gray-50">
                        <th class="py-3 px-4 bg-gray-100 text-gray-700 text-left font-medium">Cliente</th>
                        <td class="py-3 px-4">{{ $cuota->cliente->nombre }}</td>
                    </tr>
                    <tr class="border-b even:bg-gray-50">
                        <th class="py-3 px-4 bg-gray-100 text-gray-700 text-left font-medium">Concepto</th>
                        <td class="py-3 px-4">{{ $cuota->concepto }}</td>
                    </tr>
                    <tr class="border-b even:bg-gray-50">
                        <th class="py-3 px-4 bg-gray-100 text-gray-700 text-left font-medium">Fecha Emisión</th>
                        <td class="py-3 px-4">{{ $cuota->fecha_emision }}</td>
                    </tr>
                    <tr class="border-b even:bg-gray-50">
                        <th class="py-3 px-4 bg-gray-100 text-gray-700 text-left font-medium">Importe</th>
                        <td class="py-3 px-4">{{ $cuota->importe }}</td>
                    </tr>
                    <tr class="border-b even:bg-gray-50">
                        <th class="py-3 px-4 bg-gray-100 text-gray-700 text-left font-medium">Pagada</th>
                        <td class="py-3 px-4">{{ $cuota->pagada == 'S' ? 'Sí' : 'No' }}</td>
                    </tr>
                    <tr class="border-b even:bg-gray-50">
                        <th class="py-3 px-4 bg-gray-100 text-gray-700 text-left font-medium">Fecha de Pago</th>
                        <td class="py-3 px-4">{{ $cuota->fecha_pago }}</td>
                    </tr>
                    <tr class="border-b even:bg-gray-50">
                        <th class="py-3 px-4 bg-gray-100 text-gray-700 text-left font-medium">Notas</th>
                        <td class="py-3 px-4">{{ $cuota->notas }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('cuotas.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Volver
            </a>
        </div>
    </div>
</x-app-layout>
