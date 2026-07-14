<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('areas.create') }}">Áreas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('training-centers.create') }}">Centros</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('computers.create') }}">Computadores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('courses.create') }}">Cursos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('teachers.create') }}">Instructores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('apprentices.create') }}">Aprendices</a></li>
      </ul>
    </div>
  </div>
</nav>
