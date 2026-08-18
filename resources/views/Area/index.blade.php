@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Áreas</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('areas.create') }}" class="btn btn-primary">+ Crear Área</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <!-- Buscador -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('areas.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre..." value="{{ $search }}">
                <button type="submit" class="btn btn-outline-primary">🔍 Buscar</button>
                @if (!empty($search))
                    <a href="{{ route('areas.index') }}" class="btn btn-outline-secondary">✕ Limpiar</a>
                @endif
            </form>
        </div>
    </div>

    @if ($areas->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                        <tr>
                            <td>{{ $area->id }}</td>
                            <td>{{ $area->name }}</td>
                            <td>
                                <a href="{{ route('areas.show', $area->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            No hay áreas registradas. <a href="{{ route('areas.create') }}">Crear una</a>
        </div>
    @endif
</div>
@endsection
