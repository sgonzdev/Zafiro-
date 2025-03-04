<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Perfume') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.perfumes.update', $perfume->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $perfume->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="brand" class="block text-sm font-medium text-gray-700">Marca</label>
                            <input type="text" name="brand" id="brand" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $perfume->brand }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $perfume->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image_url" class="block text-sm font-medium text-gray-700">URL de la Imagen</label>
                            <input type="url" name="image_url" id="image_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $perfume->image_url }}" placeholder="https://ejemplo.com/imagen.jpg">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
