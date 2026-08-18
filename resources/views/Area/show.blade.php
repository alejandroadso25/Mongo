@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $area->name }}</h2>
            <hr>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detalles del Área</h5>
                    <p><strong>ID:</strong> {{ $area->id }}</p>
                    <p><strong>Nombre:</strong> {{ $area->name }}</p>
                    <p><strong>Creado:</strong> {{ $area->created_at ? $area->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                    <p><strong>Actualizado:</strong> {{ $area->updated_at ? $area->updated_at->format('d/m/Y H:i') : 'N/A' }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar esta área?')">Eliminar</button>
                </form>
                <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
