@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6"><h2>Computadores</h2></div>
        <div class="col-md-6 text-end">
            <a href="{{ route('computers.create') }}" class="btn btn-primary">+ Nuevo Computador</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <!-- Buscador -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('computers.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por marca o número..." value="{{ $search }}">
                <button type="submit" class="btn btn-outline-primary">🔍 Buscar</button>
                @if (!empty($search))
                    <a href="{{ route('computers.index') }}" class="btn btn-outline-secondary">✕ Limpiar</a>
                @endif
            </form>
        </div>
    </div>

    @if ($computers->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Número</th>
                        <th>Marca</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($computers as $computer)
                        <tr>
                            <td>{{ $computer->number }}</td>
                            <td>{{ $computer->brand }}</td>
                            <td>
                                <a href="{{ route('computers.show', $computer->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('computers.edit', $computer->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('computers.destroy', $computer->id) }}" method="POST" style="display:inline-block;">
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
        <div class="alert alert-info">No hay computadoras registradas. <a href="{{ route('computers.create') }}">Crear una</a></div>
    @endif
</div>
@endsection
