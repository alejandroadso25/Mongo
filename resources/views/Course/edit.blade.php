@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Editar Curso</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('courses.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="course_number" class="form-label">Número de Curso:</label>
                            <input type="text" class="form-control @error('course_number') is-invalid @enderror" id="course_number" name="course_number" value="{{ old('course_number', $course->course_number) }}" required>
                            @error('course_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="day" class="form-label">Día:</label>
                            <input type="text" class="form-control @error('day') is-invalid @enderror" id="day" name="day" value="{{ old('day', $course->day) }}" required>
                            @error('day')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="area_id" class="form-label">Área:</label>
                            <select id="area_id" name="area_id" class="form-select @error('area_id') is-invalid @enderror" required>
                                <option value="">Seleccionar área</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" {{ old('area_id', $course->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                                @endforeach
                            </select>
                            @error('area_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="training_center_id" class="form-label">Centro de Capacitación:</label>
                            <select id="training_center_id" name="training_center_id" class="form-select @error('training_center_id') is-invalid @enderror" required>
                                <option value="">Seleccionar centro</option>
                                @foreach ($training_centers as $center)
                                    <option value="{{ $center->id }}" {{ old('training_center_id', $course->training_center_id) == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                                @endforeach
                            </select>
                            @error('training_center_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
