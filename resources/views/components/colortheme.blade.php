<!-- Switch fijo en esquina inferior derecha -->
<div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox">
        <div class="slider-mini round"></div>
    </label>
</div>

<style>
    /* Posicionamiento fijo en la esquina inferior derecha */
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

    /* Switch más pequeño */
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

    /* Temas */
    body {
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    .dark-theme {
        background-color: #121212;
        color: #e0e0e0;
    }

    .light-theme {
        background-color: #ffffff;
        color: #121212;
    }

    .navbar, .footer, .card, .modal-content {
        background-color: #1e1e1e;
        color: #fff;
    }

    .form-control, .btn {
        background-color: #2c2c2c;
        color: #fff;
        border-color: #444;
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
