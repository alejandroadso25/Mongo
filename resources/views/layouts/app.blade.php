<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin_Sena</title>

    {{-- Carga de estilos y dependencias del <head> (CSS, fuentes, etc.) --}}
    @include('includes.dependencias')
</head>
<body>

    {{-- Componente de navegación principal (Menú superior) --}}
    @include('includes.navbar')

    {{-- Contenedor principal de la aplicación --}}
    <div class="container mt-4">

        {{-- FUNCIONALIDAD DINÁMICA: "Ver Registros"--}}
        @if (Request::is('*create*') || Request::is('*edit*'))
            @php
                $prefix = Request::segment(1); 
            @endphp
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ url($prefix) }}" class="btn btn-info text-white shadow-sm">
                    📋 Ver Registros
                </a>
            </div>
        @endif

        {{-- Espacio reservado donde se inyecta el contenido de las vistas hijas (@section('content')) --}}
        @yield('content')

    </div>

    {{-- Pie de página de la aplicación --}}
    @include('includes.footer')

    {{-- Carga de scripts y dependencias al final del <body> (JS, Bootstrap, etc.) --}}
    @include('includes.dependenciasbody')

</body>
</html>
