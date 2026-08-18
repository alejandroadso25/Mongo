@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Detalles del Curso</h2>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label"><strong>Número de Curso:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $course->course_number }}</p>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label"><strong>Día:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $course->day }}</p>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label"><strong>Área:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $course->area?->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label"><strong>Centro de Capacitación:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $course->trainingCenter?->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
