@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6"><h2>Asignaciones Curso-Docente</h2></div>
        <div class="col-md-6 text-end">
            <a href="{{ route('course-teachers.create') }}" class="btn btn-primary">+ Nueva Asignación</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <!-- Buscador -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('course-teachers.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por curso o docente..." value="{{ $search }}">
                <button type="submit" class="btn btn-outline-primary">🔍 Buscar</button>
                @if (!empty($search))
                    <a href="{{ route('course-teachers.index') }}" class="btn btn-outline-secondary">✕ Limpiar</a>
                @endif
            </form>
        </div>
    </div>

    @if ($courseTeachers->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Curso</th>
                        <th>Docente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseTeachers as $courseTeacher)
                        <tr>
                            <td>{{ $courseTeacher->id }}</td>
                            <td>{{ $courseTeacher->course?->course_number ?? 'N/A' }} - {{ $courseTeacher->course?->area?->name ?? 'N/A' }}</td>
                            <td>{{ $courseTeacher->teacher?->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('course-teachers.show', $courseTeacher->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('course-teachers.edit', $courseTeacher->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('course-teachers.destroy', $courseTeacher->id) }}" method="POST" style="display:inline-block;">
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
        <div class="alert alert-info">No hay asignaciones registradas. <a href="{{ route('course-teachers.create') }}">Crear una</a></div>
    @endif
</div>
@endsection
