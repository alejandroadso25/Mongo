@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6"><h2>Centros de Capacitación</h2></div>
        <div class="col-md-6 text-end">
            <a href="{{ route('training-centers.create') }}" class="btn btn-primary">+ Nuevo Centro</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <!-- Buscador -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('training-centers.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o ubicación..." value="{{ $search }}">
                <button type="submit" class="btn btn-outline-primary">🔍 Buscar</button>
                @if (!empty($search))
                    <a href="{{ route('training-centers.index') }}" class="btn btn-outline-secondary">✕ Limpiar</a>
                @endif
            </form>
        </div>
    </div>

    @if ($training_centers->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($training_centers as $training_center)
                        <tr>
                            <td>{{ $training_center->id }}</td>
                            <td>{{ $training_center->name }}</td>
                            <td>{{ $training_center->location }}</td>
                            <td>
                                <a href="{{ route('training-centers.show', $training_center->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('training-centers.edit', $training_center->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('training-centers.destroy', $training_center->id) }}" method="POST" style="display:inline-block;">
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
        <div class="alert alert-info">No hay centros registrados. <a href="{{ route('training-centers.create') }}">Crear uno</a></div>
    @endif
</div>
@endsection
