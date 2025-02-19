<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    
    <!-- CSS -->
    <link href="{{ asset('css/sidemenu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <style>
        :root {
            --width: 250px;
            --padding: 7px;
            --bgcolor: rgb(200, 200, 200);
            --hovercolor: rgb(255, 255, 255);
            --width-collapsed: 80px;
            --textcolor: #000000;
            --font-weight-bold: bold;
        }

        body {
            background-color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            padding: 0;
            margin: 0;
            color: var(--textcolor);
        }

        .body-expanded {
            margin-left: var(--width);
        }

        #sidebar {
            background-color: var(--bgcolor);
            color: var(--textcolor);
            position: fixed;
            left: 0;
            height: 100%;
            top: 0;
            width: var(--width);
            transition: width 0.3s ease;
            overflow-y: auto;
        }

        #sidebar a {
            color: var(--textcolor);
            text-decoration: none;
        }

        #sidebar.collapsed {
            width: var(--width-collapsed);
        }

        #sidebar #header {
            box-sizing: border-box;
            border-bottom: solid var(--hovercolor);
            padding: var(--padding);
            text-align: center;
            font-weight: var(--font-weight-bold);
        }

        #sidebar #menu-items {
            padding-top: var(--padding);
        }

        #sidebar .item {
            padding: var(--padding);
            display: flex;
            align-items: center;
        }

        #sidebar .item a {
            display: flex;
            align-items: center;
            font-weight: var(--font-weight-bold);
        }

        #sidebar .item .icon {
            width: 60px;
            padding-right: 5px;
        }

        #sidebar .separator {
            height: 1px;
            border-bottom: solid var(--hovercolor);
            margin: 5px 0;
        }

        .dark-mode #sidebar {
            background-color: #023d78;
        }

        .dark-mode #sidebar a {
            color: #ffffff;
        }

        .dark-mode #sidebar .separator {
            border-bottom-color: #FFFFFF;
        }

        #content {
            margin-left: var(--width);
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        #sidebar.collapsed + #content {
            margin-left: var(--width-collapsed);
        }
    </style>
</head>

<body class="dark-mode body-expanded">
    <!-- Barra lateral -->
    <div id="sidebar">
        <div id="header">
            <div id="menu-btn">
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
            </div>
        </div>

        <div id="menu-items">
            <div class="item">
                <a href="{{ url('/dashboard') }}">
                    <div class="icon"><img src="{{ asset('vendor/adminlte/dist/img/inicio.svg') }}" alt="Inicio"></div>
                    <div class="title"><span>INICIO</span></div>
                </a>
            </div>

            <div class="item separator"></div>

            <div class="item">
                <a href="#" onclick="confirmLogout()">
                    <div class="icon"><img src="{{ asset('vendor/adminlte/dist/img/logout.svg') }}" alt="Cerrar Sesión"></div>
                    <div class="title"><span>CERRAR SESIÓN</span></div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- Contenido dinámico -->
    <div id="content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/tu-archivo.js') }}"></script>

    <script>
        function confirmLogout() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Realmente quieres cerrar sesión?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#ffc107',
                confirmButtonText: 'Sí, cerrar sesión',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        document.querySelector('#menu-btn').addEventListener('click', () => {
            document.querySelector('#sidebar').classList.toggle("collapsed");
        });
    </script>
</body>
</html>
