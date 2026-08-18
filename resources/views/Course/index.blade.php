@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6"><h2>Cursos</h2></div>
        <div class="col-md-6 text-end">
            <a href="{{ route('courses.create') }}" class="btn btn-primary">+ Nuevo Curso</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    @if ($courses->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Número</th>
                        <th>Día</th>
                        <th>Área</th>
                        <th>Centro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_number }}</td>
                            <td>{{ $course->day }}</td>
                            <td>{{ $course->area?->name ?? 'N/A' }}</td>
                            <td>{{ $course->trainingCenter?->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">No hay cursos registrados. <a href="{{ route('courses.create') }}">Crear uno</a></div>
    @endif
</div>
@endsection
