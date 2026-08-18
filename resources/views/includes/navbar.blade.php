<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('areas.index') }}">Áreas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('training-centers.index') }}">Centros</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('computers.index') }}">Computadores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Cursos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('teachers.index') }}">Instructores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('apprentices.index') }}">Aprendices</a></li>
      </ul>
    </div>
  </div>
</nav>

