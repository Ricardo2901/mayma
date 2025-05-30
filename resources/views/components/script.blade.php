<!-- Bootstrap 5 JS bundle (incluye Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script>
    // Detectar retroceso de página con la flecha atrás o Alt + ←
    window.addEventListener("popstate", function() {
        if (!sessionStorage.getItem("loggedIn")) {
            window.location.href = "{{ route('login') }}";
        }
    });

    // Configuración inicial para saber si el usuario está autenticado
    if (!{{ auth()->check() ? 'true' : 'false' }}) {
        sessionStorage.setItem("loggedIn", "false");
    } else {
        sessionStorage.setItem("loggedIn", "true");
    }
</script>


 <!-- PDF.js desde CDN (viewer básico) -->



