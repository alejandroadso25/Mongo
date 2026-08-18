@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Crear Aprendiz</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('apprentices.store') }}" method="POST">
                        @csrf
                        
                        <!-- Nombre -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Celular -->
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Celular:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Selector de Curso -->
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

                        <!-- Selector de Computadora (Muestra Marca y Número) -->
                        <div class="form-group mb-3">
                            <label for="computer_id" class="form-label">Computadora:</label>
                            <select id="computer_id" name="computer_id" class="form-select @error('computer_id') is-invalid @enderror">
                                <option value="">Seleccionar computadora (Opcional)</option>
                                @foreach ($computers as $computer)
                                    <option value="{{ $computer->id }}" {{ old('computer_id') == $computer->id ? 'selected' : '' }}>
                                        {{ $computer->brand }} - {{ $computer->number }} (Área: {{ $computer->area?->name ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('computer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('apprentices.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection