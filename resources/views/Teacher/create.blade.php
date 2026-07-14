@extends('layouts.app')

@section('title', 'Registrar Instructor')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('teachers.store') }}" method="POST" class="row g-3">
                <h1 class="h4">Registrar Instructor</h1>
                @csrf

                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="area_id" class="form-label">Área</label>
                    <select id="area_id" name="area_id" class="form-select" required>
                        <option value="">Seleccionar área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="training_center_id" class="form-label">Centro de Formación</label>
                    <select id="training_center_id" name="training_center_id" class="form-select" required>
                        <option value="">Seleccionar centro</option>
                        @foreach ($trainingCenters as $center)
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

    <h2 class="mt-4">Docentes registrados</h2>
    <ul class="list-group">
        @foreach ($teachers as $teacher)
            <li class="list-group-item">ID: {{ $teacher->id }} - Nombre: {{ $teacher->name }} - Email: {{ $teacher->email }} - Área_id: {{ $teacher->area_id }} - Training_center_id: {{ $teacher->training_center_id }}</li>
        @endforeach
    </ul>
@endsection
