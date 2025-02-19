@extends('menu')

@section('title', 'Inicio')

@section('content')
    <div class="title-logo">
        <h1>Instituto Nacional Agrario</h1>
        <img src="images/logo.png" alt="Logo de la Institucion" class="logo">
    </div>

    <div class="container">
        <div class="card">
            <img src="images/equipos.jpg" alt="Equipos">
            <div class="card-content">
                <h5>Inventario de Equipos</h5>
                <p>Consulta y administra el inventario de equipos de cómputo.</p>
            </div>
        </div>
    </div>

    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h5 {
            margin-top: 0;
            font-size: 1.5rem;
        }

        .card-content p {
            margin-bottom: 0;
        }

        /* Estilos para el título y el logo */
        .title-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 50px;
        }
    </style>
@endsection
