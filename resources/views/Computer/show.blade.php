@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Detalles del Computador</h2>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label"><strong>Número:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $computer->number }}</p>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label"><strong>Marca:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $computer->brand }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('computers.edit', $computer->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('computers.destroy', $computer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                    <a href="{{ route('computers.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
