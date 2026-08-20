@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Aprendices</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('apprentices.create') }}" class="btn btn-primary">+ Crear Aprendiz</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <!-- Buscador -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('apprentices.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, email o curso..." value="{{ $search }}">
                <button type="submit" class="btn btn-outline-primary">🔍 Buscar</button>
                @if (!empty($search))
                    <a href="{{ route('apprentices.index') }}" class="btn btn-outline-secondary">✕ Limpiar</a>
                @endif
            </form>
        </div>
    </div>

    @if ($apprentices->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apprentices as $apprentice)
                        <tr>
                            <td>{{ $apprentice->name }}</td>
                            <td>{{ $apprentice->email }}</td>
                            <td>{{ $apprentice->cell_number ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('apprentices.show', $apprentice->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('apprentices.edit', $apprentice->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('apprentices.destroy', $apprentice->id) }}" method="POST" style="display:inline-block;">
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
        <div class="alert alert-info">No hay aprendices registrados. <a href="{{ route('apprentices.create') }}">Crear uno</a></div>
    @endif
</div>
@endsection
