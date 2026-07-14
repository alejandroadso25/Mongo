@extends('layouts.app')

@section('title', 'Registrar Curso')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('courses.store') }}" method="POST" class="row g-3">
                <h1 class="h4">Registrar Curso</h1>
                @csrf

                <div class="col-md-6">
                    <label for="course_number" class="form-label">Número de curso</label>
                    <input type="text" id="course_number" name="course_number" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="day" class="form-label">Día</label>
                    <input type="text" id="day" name="day" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="area_id" class="form-label">Área</label>
                    <select id="area_id" name="area_id" class="form-select">
                        <option value="">Seleccionar área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="training_center_id" class="form-label">Centro de Formación</label>
                    <select id="training_center_id" name="training_center_id" class="form-select">
                        <option value="">Seleccionar centro</option>
                        @foreach ($training_centers as $center)
                            <option value="{{ $center->id }}">{{ $center->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ url('/') }}" class="btn btn-secondary ms-2">Volver</a>
                </div>
            </form>
        </div>
    </div>

    <pre class="mt-3 bg-light p-3">{{ session('record') }}</pre>

    <h2 class="mt-4">Cursos registrados</h2>
    <ul class="list-group">
        @foreach ($courses as $course)
            <li class="list-group-item">ID: {{ $course->id }} - Número: {{ $course->course_number }} - Día: {{ $course->day }} - Área: {{ $course->area_id }} - Centro: {{ $course->training_center_id }}</li>
        @endforeach
    </ul>
@endsection
