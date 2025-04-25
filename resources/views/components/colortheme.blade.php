<!-- Switch fijo en esquina inferior derecha -->
<div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox">
        <div class="slider-mini round"></div>
    </label>
</div>

<style>
    /* Switch en esquina inferior derecha */
    .theme-switch-wrapper {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        display: flex;
        align-items: center;
        background-color: #2c2c2c;
        padding: 6px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .theme-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .theme-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider-mini {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 20px;
    }

    .slider-mini:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked + .slider-mini {
        background-color: #2196F3;
    }

    input:checked + .slider-mini:before {
        transform: translateX(20px);
    }

    /* Animación al cambiar tema */
    body {
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    /* Tema claro por defecto */
    .light-theme {
        background-color: #ffffff;
        color: #121212;
    }

    /* Tema oscuro */
    .dark-theme {
        background-color: #121212;
        color: #e0e0e0;
    }

    /* Personalizar componentes en modo oscuro */
    .dark-theme .navbar,
    .dark-theme .footer,
    .dark-theme .card,
    .dark-theme .modal-content {
        background-color: #1e1e1e;
        color: #fff;
    }

    .dark-theme .form-control,
    .dark-theme .btn {
        background-color: #2c2c2c;
        color: #fff;
        border-color: #444;
    }

    .dark-theme .btn-primary {
        background-color: #1f6feb;
        border-color: #1f6feb;
        color: #fff;
    }

    .dark-theme .btn-primary:hover {
        background-color: #155ab6;
        border-color: #155ab6;
    }

    .light-theme .btn-primary {
        background-color: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    .light-theme .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }

    /* Cuando haces clic */
    .light-theme .btn-primary:active,
    .light-theme .btn-primary:focus {
        background-color: #0b5ed7;
        border-color: #0a58ca;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.5); /* efecto de enfoque */
    }

    /* Estilo por defecto en modo claro (ya se ve bien normalmente) */
    .light-theme .btn-close {
        filter: invert(0);
    }

    /* Cambia el color de la "X" en modo oscuro */
    .dark-theme .btn-close {
        filter: invert(1);
    }

    /* Estilos para el modo oscuro de las tablas */
    .dark-theme .table, 
    .dark-theme .table th, 
    .dark-theme .table td {
        background-color: #1e1e1e; /* Fondo oscuro para la tabla */
        color: #e0e0e0; /* Texto claro para que se lea bien */
    }

    .dark-theme .table th {
        background-color: #333333; /* Fondo un poco más oscuro para los encabezados */
    }

    /* Si quieres que las filas alternen colores */
    .dark-theme .table-striped tbody tr:nth-of-type(odd) {
        background-color: #2c2c2c; /* Color más oscuro para filas alternas */
    }

    .dark-theme .table-striped tbody tr:nth-of-type(even) {
        background-color: #1e1e1e; /* Fondo más oscuro para las filas pares */
    }

    /* Mantener color de botones sin importar el tema */
    /* === Estilo outline solo cuando el tema oscuro está activo === */
    /* === Modo oscuro: botones Bootstrap con estilo personalizado === */

    .dark-theme .btn-primary {
        background-color: transparent !important;
        color: #0d6efd !important;
        border: 2px solid #0d6efd !important;
    }

    .dark-theme .btn-primary:hover {
        background-color: #0d6efd !important;
        color: #fff !important;
    }

    .dark-theme .btn-secondary {
        background-color: transparent !important;
        color: #6c757d !important;
        border: 2px solid #6c757d !important;
    }

    .dark-theme .btn-secondary:hover {
        background-color: #6c757d !important;
        color: #fff !important;
    }

    .dark-theme .btn-success {
        background-color: transparent !important;
        color: #198754 !important;
        border: 2px solid #198754 !important;
    }

    .dark-theme .btn-success:hover {
        background-color: #198754 !important;
        color: #fff !important;
    }

    .dark-theme .btn-danger {
        background-color: transparent !important;
        color: #dc3545 !important;
        border: 2px solid #dc3545 !important;
    }

    .dark-theme .btn-danger:hover {
        background-color: #dc3545 !important;
        color: #fff !important;
    }

    .dark-theme .btn-warning {
        background-color: transparent !important;
        color: #ffc107 !important;
        border: 2px solid #ffc107 !important;
    }

    .dark-theme .btn-warning:hover {
        background-color: #ffc107 !important;
        color: #000 !important;
    }

    .dark-theme .btn-info {
        background-color: transparent !important;
        color: #0dcaf0 !important;
        border: 2px solid #0dcaf0 !important;
    }

    .dark-theme .btn-info:hover {
        background-color: #0dcaf0 !important;
        color: #000 !important;
    }

    .dark-theme .btn-light {
        background-color: transparent !important;
        color: #f8f9fa !important;
        border: 2px solid #f8f9fa !important;
    }

    .dark-theme .btn-light:hover {
        background-color: #f8f9fa !important;
        color: #000 !important;
    }

    .dark-theme .btn-dark {
        background-color: transparent !important;
        color: #212529 !important;
        border: 2px solid #212529 !important;
    }

    .dark-theme .btn-dark:hover {
        background-color: #212529 !important;
        color: #fff !important;
    }

    /* === Focus para todos los botones Bootstrap en modo oscuro === */
    .dark-theme .btn-primary:focus,
    .dark-theme .btn-secondary:focus,
    .dark-theme .btn-success:focus,
    .dark-theme .btn-danger:focus,
    .dark-theme .btn-warning:focus,
    .dark-theme .btn-info:focus,
    .dark-theme .btn-light:focus,
    .dark-theme .btn-dark:focus {
        box-shadow: 0 0 0 0.2rem rgba(0,0,0,0.2) !important;
        outline: none;
    }

    /* Estilo para el offcanvas en modo oscuro */
    .dark-theme .offcanvas {
        background-color: #1e1e1e;
        color: #fff;
    }

    /* Estilo para la lista del offcanvas */
    .dark-theme .list-group-item {
        background-color: #2c2c2c;
        background-color: #1e1e1e;
        color: #fff;
    }
</style>

<script>
    const checkbox = document.getElementById("checkbox");
    const currentTheme = localStorage.getItem("theme");

    function switchTheme() {
        if (checkbox.checked) {
            document.body.classList.add("dark-theme");
            document.body.classList.remove("light-theme");
            localStorage.setItem("theme", "dark");
        } else {
            document.body.classList.add("light-theme");
            document.body.classList.remove("dark-theme");
            localStorage.setItem("theme", "light");
        }
    }

    // Activar light por defecto, o aplicar el guardado en localStorage
    if (currentTheme === "dark") {
        checkbox.checked = true;
        document.body.classList.add("dark-theme");
    } else {
        checkbox.checked = false;
        document.body.classList.add("light-theme");
    }

    checkbox.addEventListener("change", switchTheme);
</script>
