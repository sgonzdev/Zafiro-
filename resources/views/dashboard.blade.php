<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Título y botón para agregar perfume -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Gestión de Perfumes</h1>
                        <a href="{{ route('dashboard.perfumes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Agregar Perfume
                        </a>
                    </div>

                    <!-- Buscador -->
                    <form action="{{ route('dashboard') }}" method="GET" class="mb-6">
                        <div class="flex">
                            <input type="text" name="search" placeholder="Buscar por nombre o marca" class="w-full px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600">
                                Buscar
                            </button>
                        </div>
                    </form>

                    <!-- Tabla de perfumes -->
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Marca
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descripción
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Imagen
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($perfumes as $perfume)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $perfume->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $perfume->brand }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $perfume->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($perfume->image_url)
                                        <img src="{{ $perfume->image_url }}" alt="{{ $perfume->name }}" class="w-16 h-16 object-cover rounded-md">
                                    @else
                                        <span class="text-gray-400">Sin imagen</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('dashboard.perfumes.edit', $perfume->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">
                                        Editar
                                    </a>
                                    <form action="{{ route('dashboard.perfumes.destroy', $perfume->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $perfumes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
