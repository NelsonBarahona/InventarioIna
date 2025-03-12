<!DOCTYPE html>
<html lang="en">
@extends('menu')
@section('title', 'Inventario')
@section('content')
<head>  
<meta charset="UTF-8">
<link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JavaScript (y Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style> 
    /* Estilos Generales */
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }

    h1 {
        text-align: center;
        margin-top: 30px;
    }

    /* Estilos para los botones */
    .btn {
        color: #fff;
        font-size: 12px;
        padding: 10px 20px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .btn-azul-cielo {
        background-color: #87CEEB !important; /* Azul cielo claro */
        border-color: #87CEEB !important;
        color: black !important;
    }

    .btn-warning {
        color: black !important;
    }

    .btn-azul-cielo:hover {
        background-color: #6CB6D9 !important; /* Un tono más oscuro al pasar el mouse */
        border-color: #6CB6D9 !important;
    }

    /* Contenedor de búsqueda y botones */
    .search-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px; /* Añadido un espacio entre los elementos */
    }

    .search-container input {
        width: 100%;
        max-width: 300px;
        padding: 8px;
    }

    .button-container {
        display: flex;
        gap: 10px;
    }

    .button-container button {
        font-size: 14px;
        padding: 10px 20px;
    }

    /* Contenedor de la tabla */
    .table-container {
        display: flex;
        justify-content: center;
        width: 100%;
        max-width: 1000px;
        margin: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .table-primary {
        background-color: #87CEEB !important; 
        border-color: #87CEEB;
    }

    table, th, td {
        border: 1px solid #ddd;
        padding: 8px;
        word-wrap: break-word;
        max-width: 150px;
    }

    /* Estilos del Modal */
    .modal-dialog {
        max-width: 30%;
    }

    .modal-body {
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    /* Estilos Responsivos */
    @media (max-width: 768px) {
        /* Los botones se apilan en pantallas pequeñas */
        .button-container {
            flex-direction: column;
            align-items: stretch;
        }

        .button-container button {
            width: 100%;
        }

        .search-container {
            flex-direction: column; /* Los elementos de búsqueda se apilan */
            gap: 10px;
        }

        .search-container input {
            width: 100%;
        }
    }

    /* Estilos para las tarjetas */
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

    /* Título y logo */
    .title-logo {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo {
        width: 50px;
    }
</style>

</head>
<div style="margin-left: -250px;">
<h1><strong>Inventario de Equipos de Cómputo</strong></h1>
    <div class="container">
        
        <!-- Contenedor de búsqueda y botones -->
        <form method="GET" action="{{ route('inventario') }}" id="searchForm">
    <div class="search-container">
        <input type="text" id="search" name="search" class="form-control" value="{{ request('search') }}" placeholder="Buscar" style="max-width: 300px; width: 100%;"> 
        <div class="button-container d-flex gap-2">
            <button type="submit" class="btn btn-azul-cielo"><strong>Buscar</strong></button>
            <button type="button" class="btn btn-azul-cielo" data-bs-toggle="modal" data-bs-target="#registerModal"><strong>Agregar</strong></button>
            <button class="btn btn-warning" id="generarReporte"><strong>Generar Reporte</strong></button>
        </div>
    </div>  
</form>

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

      <!-- Mostrar resultados de búsqueda -->
<div class="d-flex justify-content-center my-3">
    <strong><h5>Mostrando {{ $inventarios->firstItem() }}–{{ $inventarios->lastItem() }} de {{ $inventarios->total() }} resultados</strong></h5>
</div>
<table class="table table-bordered border-primary" id="inventarioTable">
    <thead class="table-primary">
        <tr>
            <th>Código</th>
            <th>Tipo</th>
            <th>Marca/Modelo</th>
            <th>Ficha</th>
            <th>Inventario</th>
            <th>Oficina</th>
            <th>Estado</th>
            <th>Disco Duro</th>
            <th>Ram</th>
            <th>Observaciones</th>
            <th>Service Tag</th>
            <th>Estado Actual</th>
            <th class="text-center acciones-ajustadas">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inventarios as $inventario)
            <tr>
                <td>{{ $inventario->ID_EQUIPO }}</td>
                <td>{{ $inventario->TIPO_EQUIPO }}</td>
                <td>{{ $inventario->MARCA_MODELO }}</td>
                <td>{{ $inventario->FICHA }}</td>
                <td>{{ $inventario->INVENTARIO }}</td>
                <td>{{ $inventario->OFICINA }}</td>
                <td>{{ $inventario->ESTADO }}</td>
                <td>{{ $inventario->DISCO_DURO }}</td>
                <td>{{ $inventario->RAM }}</td>
                <td>{{ $inventario->OBSERVACIONES }}</td>
                <td>{{ $inventario->SERVICE_TAG }}</td>
                <td>
                    @if($inventario->ESTADO_ACTUAL == 1)
                        ACTIVO
                    @elseif($inventario->ESTADO_ACTUAL == 0)
                        INACTIVO
                    @endif
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-azul-cielo btn-sm mx-auto" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editarModal{{ $inventario->ID_EQUIPO }}">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="delete btn btn-warning btn-sm mx-auto" 
                        data-inventario-id="{{ $inventario->ID_EQUIPO }}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
{{ $inventarios->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}

</div>
</div>
        </div>
    </div>
    <script>
    // Detectar cuando el campo de búsqueda está vacío
    document.getElementById('search').addEventListener('input', function() {
        var searchValue = this.value;

        // Si el campo está vacío, redirigir a la primera página
        if (searchValue === '') {
            var currentUrl = window.location.href.split('?')[0]; // Obtener la URL sin parámetros
            window.location.href = currentUrl + '?page=1'; // Redirigir a la primera página
        }
    });
</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
