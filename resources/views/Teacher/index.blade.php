@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6"><h2>Docentes</h2></div>
        <div class="col-md-6 text-end">
            <a href="{{ route('teachers.create') }}" class="btn btn-primary">+ Nuevo Docente</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <!-- Buscador -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('teachers.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, email o área..." value="{{ $search }}">
                <button type="submit" class="btn btn-outline-primary">🔍 Buscar</button>
                @if (!empty($search))
                    <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary">✕ Limpiar</a>
                @endif
            </form>
        </div>
    </div>

    @if ($teachers->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Área</th>
                        <th>Centro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->area?->name ?? 'N/A' }}</td>
                            <td>{{ $teacher->trainingCenter?->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
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
        <div class="alert alert-info">No hay docentes registrados. <a href="{{ route('teachers.create') }}">Crear uno</a></div>
    @endif
</div>
@endsection
