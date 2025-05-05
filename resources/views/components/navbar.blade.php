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
      <!-- @auth es una directiva de Blade que verifica si el usuario está autenticado -->
      <ul class="navbar-nav ms-auto"> <!-- ms-auto: margin-start auto en Bootstrap 5 -->
        <li class="nav-item">
          <img src="{{ asset(Auth::user() -> avatar) }}" alt="Avatar" class="rounded-circle" width="38" height="38">
        <li class="nav-item dropdown">
          @if(Auth::check())
          
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingUsername" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
          {{ Auth::user() -> name }}
          </a>
          @endif
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingUsername">
            <li><a class="dropdown-item" href="#" id="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
            <li><a class="dropdown-item" href="{{ route('pages.admin.perfil') }}">Ver Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Configuración</a></li>
          </ul>
        </li>
      </ul>
      <!-- Formulario Oculto para Cerrar Sesión -->
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      <!-- @endauth -->
    </div>
  </div>
</nav>

<!-- Offcanvas de la configuración -->
<x-offcanvas></x-offcanvas>