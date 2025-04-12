<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido de nuevo a Zafiro') }}
        </h2>
    </x-slot>

    <style>
        .perfume-table {
            width: 95%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .perfume-table th,
        .perfume-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .perfume-table th {
            background-color: #f8fafc;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
        }

        .perfume-table .col-nombre {
            width: 20%;
        }

        .perfume-table .col-marca {
            width: 20%;
        }

        .perfume-table .col-descripcion {
            width: 40%;
        }

        .perfume-table .col-imagen {
            width: 10%;
        }

        .perfume-table .col-acciones {
            width: 10%;
        }

        /* Estilo para el contenido de celdas */
        .cell-content {
            word-wrap: break-word; /* Para navegadores antiguos */
            overflow-wrap: break-word;
            word-break: break-word; /* Rompe palabras cuando sea necesario */
            hyphens: auto;
            max-width: 100%;
        }

        .perfume-img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 4px;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
        }

        .btn-edit {
            color: #2563eb;
            font-weight: 500;
            text-decoration: none;
        }

        .btn-edit:hover {
            color: #1d4ed8;
        }

        .btn-delete {
            color: #dc2626;
            font-weight: 500;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .btn-delete:hover {
            color: #b91c1c;
        }

        /* Estilos adicionales */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .btn-add {
            padding: 8px 16px;
            background-color: #3b82f6;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .btn-add:hover {
            background-color: #2563eb;
        }

        .search-form {
            margin-bottom: 24px;
        }

        .search-container {
            display: flex;
        }

        .search-input {
            width: 100%;
            padding: 8px 16px;
            border: 1px solid #d1d5db;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        .search-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.25);
        }

        .search-button {
            padding: 8px 16px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #2563eb;
        }

        .table-container {
            overflow-x: auto; /* Permite scroll horizontal si es necesario */
        }

        .no-image-text {
            color: #9ca3af;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Título y botón para agregar perfume -->
                    <div class="header-container">
                        <h1 class="page-title">Gestión de Perfumes</h1>
                        <a href="{{ route('dashboard.perfumes.create') }}" class="btn-add">
                            Agregar Perfume
                        </a>
                    </div>

                    <!-- Buscador -->
                    <form action="{{ route('dashboard') }}" method="GET" class="search-form">
                        <div class="search-container">
                            <input type="text" name="search" placeholder="Buscar por nombre o marca" class="search-input">
                            <button type="submit" class="search-button">
                                Buscar
                            </button>
                        </div>
                    </form>

                    <!-- Tabla de perfumes -->
                    <div class="table-container">
                        <table class="perfume-table">
                            <thead>
                                <tr>
                                    <th class="col-nombre">Nombre</th>
                                    <th class="col-marca">Marca</th>
                                    <th class="col-descripcion">Descripción</th>
                                    <th class="col-imagen">Imagen</th>
                                    <th class="col-acciones">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perfumes as $perfume)
                                <tr>
                                    <td>
                                        <div class="cell-content">
                                            {{ $perfume->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-content">
                                            {{ $perfume->brand }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-content">
                                            {{ $perfume->description }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($perfume->image_url)
                                            <img src="{{ $perfume->image_url }}" alt="{{ $perfume->name }}" class="perfume-img">
                                        @else
                                            <span class="no-image-text">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('dashboard.perfumes.edit', $perfume->id) }}" class="btn-edit">
                                                Editar
                                            </a>
                                            <form action="{{ route('dashboard.perfumes.destroy', $perfume->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $perfumes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
