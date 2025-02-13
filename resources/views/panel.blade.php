<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Css/estilos.css')}}">
</head>
<style>
        

        

        .navbar {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: space-between;
        }

        .navbar img {
            max-width: 100px; /* Ajusta el tamaño máximo del logo */
            height: auto; /* Mantiene la proporción del logo */
        }
        body {
    background: url('images/hero.jpg') no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}




    </style>
<body>
    <header>
    <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}">
        <img src="images/logo.png" ><span>INA</span>
        </a>
             
        </nav>
      </div>
    </header>

<div class="main-content container-fluid">
    <div class="row justify-content-end">

            <!-- Contenido dinámico de la página -->
            @yield('content')
        </div>
    </div>
</div>



    <!-- Bootstrap JS v5.2.1 (opcional, solo si necesitas funcionalidades de Bootstrap que requieran JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JcfDAk5N0Mo3YXxZx+76FtPKl51d8BMOUQ+FsPovD2jkXzEabz7ZrJ47d9lm4I67" crossorigin="anonymous">
    </script>
</body>

</html>