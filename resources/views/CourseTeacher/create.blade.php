@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Crear Nueva Asignación</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('course-teachers.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="course_id" class="form-label">Curso:</label>
                            <select id="course_id" name="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                                <option value="">Seleccionar curso</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->course_number }} - Área: {{ $course->area?->name ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="teacher_id" class="form-label">Instructor:</label>
                            <select id="teacher_id" name="teacher_id" class="form-select @error('teacher_id') is-invalid @enderror" required>
                                <option value="">Seleccionar instructor</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('course-teachers.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
