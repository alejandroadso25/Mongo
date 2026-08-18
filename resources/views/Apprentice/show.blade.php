@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $apprentice->name }}</h2>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detalles del Aprendiz</h5>
                    <p><strong>ID:</strong> {{ $apprentice->id }}</p>
                    <p><strong>Nombre:</strong> {{ $apprentice->name }}</p>
                    <p><strong>Email:</strong> {{ $apprentice->email }}</p>
                    <p><strong>Celular:</strong> {{ $apprentice->phone ?? $apprentice->cell_number ?? 'N/A' }}</p>
                    <p><strong>Curso:</strong> {{ $apprentice->course?->course_number ?? 'No asignado' }}</p>
                    <p><strong>Computadora:</strong> {{ $apprentice->computer?->brand . ' (' . $apprentice->computer?->number . ')' ?? 'No asignada' }}</p>
                    <p><strong>Creado:</strong> {{ $apprentice->created_at ? $apprentice->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('apprentices.edit', $apprentice->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('apprentices.destroy', $apprentice->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                </form>
                <a href="{{ route('apprentices.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
