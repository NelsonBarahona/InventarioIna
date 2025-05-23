<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
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
      --bgcolor: #87CEEB;
      --width: 250px;
      --padding: 7px;
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
    
    #sidebar a {
  color: var(--textcolor);
  text-decoration: none !important;
}

#sidebar .title {
  text-decoration: none !important;
}

    /* Sidebar */
    #sidebar {
      background-color: var(--bgcolor) !important;
      color: var(--textcolor);
      position: fixed;
      top: 0;
      left: 0;
      width: var(--width);
      height: 100%;
      transition: width 0.3s ease;
      overflow-y: auto;
      z-index: 1000;
    }
    #sidebar.collapsed {
      width: var(--width-collapsed) !important;
    }
    #sidebar #header {
      padding: var(--padding);
      border-bottom: 1px solid var(--hovercolor);
      text-align: center;
      font-weight: var(--font-weight-bold);
    }
    #sidebar #menu-items { padding-top: var(--padding); }
    #sidebar .item { padding: var(--padding); display: flex; align-items: center; }
    #sidebar .item a { display: flex; align-items: center; font-weight: var(--font-weight-bold); color: inherit; }
    #sidebar .item .icon { width: 60px; padding-right: 5px; }
    .dark-mode #sidebar { background-color: #023d78; }
    .dark-mode #sidebar a { color: #ffffff; }
    /* Content */
    #content {
      margin-left: var(--width);
      padding: 20px;
      transition: margin-left 0.3s ease;
    }
    #content.collapsed { margin-left: var(--width-collapsed) !important; }
    /* Toggle button */
    #toggle-sidebar {
      position: fixed;
      top: 10px;
      left: 10px;
      z-index: 1101;
      background: var(--bgcolor);
      border: none;
      color: var(--textcolor);
      padding: 8px;
      border-radius: 4px;
    }
  </style>
</head>
<body class="dark-mode body-expanded">
  <!-- Botón hamburguesa fijo -->
  <button id="toggle-sidebar"><i class="fas fa-bars"></i></button>

  <!-- Barra lateral -->
  <div id="sidebar">
    <div id="header">
        <br>
        <br>
      <div id="menu-btn">
        <div class="btn-hamburger"></div>
        <div class="btn-hamburger"></div>
      </div>
    </div>
    <div id="menu-items">
        <br>
      <div class="item"><a href="/inventario"><div class="icon"><img src="{{ asset('images/inventario.svg') }}" alt=""></div><div class="title">INVENTARIO</div></a></div>
      <div class="item"><a href="#" onclick="confirmLogout()"><div class="icon"><img src="{{ asset('images/logout.svg') }}" alt="Cerrar Sesión"></div><div class="title">CERRAR SESIÓN</div></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
      </div>
    </div>
  </div>

  <!-- Contenido dinámico -->
  <div id="content">@yield('content')</div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Toggle sidebar
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('collapsed');
      document.getElementById('content').classList.toggle('collapsed');
    });
    // Confirm logout
    function confirmLogout() {
      Swal.fire({ title: '¿Estás seguro?', text: '¿Realmente quieres cerrar sesión?', imageUrl: 'images/logo.png', imageWidth:100, imageHeight:100, imageAlt:'Logo', showCancelButton:true, confirmButtonColor:'#87CEEB', cancelButtonColor:'#FFD700', confirmButtonText:'Sí, cerrar sesión', cancelButtonText:'Cancelar'}).then((result) => { if(result.isConfirmed){ document.getElementById('logout-form').submit(); }});
    }
    // SweetAlert success
    @if(session('swal_message')) Swal.fire({title:'¡Éxito!', text:'{{ session('swal_message') }}', icon:'success', confirmButtonColor:'#87CEEB', confirmButtonText:'Aceptar'}); @endif
  </script>
</body>
</html>
