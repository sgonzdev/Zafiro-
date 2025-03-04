@extends('dashboard')

@section('content')
<div class="container">
    <h1>Gestión de Perfumes</h1>
    <a href="{{ route('dashboard.perfumes.create') }}" class="btn btn-primary">Agregar Perfume</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perfumes as $perfume)
            <tr>
                <td>{{ $perfume->name }}</td>
                <td>{{ $perfume->brand }}</td>
                <td>{{ $perfume->description }}</td>
                <td>
                    <a href="{{ route('dashboard.perfumes.edit', $perfume->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('dashboard.perfumes.destroy', $perfume->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $perfumes->links() }}
</div>
@endsection
