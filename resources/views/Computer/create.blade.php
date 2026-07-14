@extends('layouts.app')

@section('title', 'Registrar Computador')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('computers.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="number" class="form-label">Número de computador</label>
                    <input type="text" id="number" name="number" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text" id="brand" name="brand" class="form-control" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <pre class="mt-3 bg-light p-3">{{ session('record') }}</pre>

    <h2 class="mt-4">Computadores registrados</h2>
    <ul class="list-group">
        @foreach ($computers as $computer)
            <li class="list-group-item">Número: {{ $computer->number }}, Marca: {{ $computer->brand }}</li>
        @endforeach
    </ul>
@endsection