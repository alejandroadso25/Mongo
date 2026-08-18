@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Editar Aprendiz</h2>
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('apprentices.update', $apprentice->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $apprentice->name }}" required>
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $apprentice->email }}" required>
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="cell_number" class="form-label">Celular</label>
                    <input type="text" class="form-control @error('cell_number') is-invalid @enderror" id="cell_number" name="cell_number" value="{{ $apprentice->cell_number }}">
                    @error('cell_number') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="course_id" class="form-label">Curso</label>
                    <select class="form-select @error('course_id') is-invalid @enderror" id="course_id" name="course_id">
                        <option value="">Seleccionar curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $apprentice->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->course_number }} - Área: {{ $course->area?->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="computer_id" class="form-label">Computadora</label>
                    <select class="form-select @error('computer_id') is-invalid @enderror" id="computer_id" name="computer_id">
                        <option value="">Seleccionar computadora</option>
                        @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}" {{ $apprentice->computer_id == $computer->id ? 'selected' : '' }}>
                                {{ $computer->brand }} - {{ $computer->number }} (Área: {{ $computer->area?->name ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                    @error('computer_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('apprentices.show', $apprentice->id) }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
