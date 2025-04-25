<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; width: 100%; z-index: 1;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Nombre</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=" {{ route('pages.admin.files') }}">Archivos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingUsers" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingUsers">
            <li><a class="dropdown-item" href="{{ route('pages.admin.users') }}">Usuarios</a></li>
            <li><a class="dropdown-item" href="{{ route('pages.admin.admin') }}">Administradores</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('pages.admin.allusers') }}">Todos los Usuarios</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
        </li>
      </ul>
      <!-- Aquí agregamos un contenedor para empujar el dropdown a la derecha -->
      <ul class="navbar-nav ms-auto"> <!-- ms-auto: margin-start auto en Bootstrap 5 -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingUsername" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Nombre de Usuario
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingUsername">
            <li><a class="dropdown-item" href="{{ route('home') }}">Cerrar Sesion</a></li>
            <li><a class="dropdown-item" href="{{ route('pages.admin.perfil') }}">Ver Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('pages.admin.settings') }}">Configuración</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>