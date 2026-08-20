@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Crear Nuevo Computador</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('computers.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="number" class="form-label">Número:</label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') }}" required>
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand" class="form-label">Marca:</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}" required>
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('computers.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection