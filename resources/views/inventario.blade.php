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
       body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}


        .container {
    max-width: 1000px; /* Limitar el ancho del contenedor */
    margin: 0 auto; /* Asegurar que el contenedor esté centrado */
    padding: 20px;
    text-align: center;
}

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            color: #fff;
            font-size: 12px;
            padding: 10px 20px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Contenedor de búsqueda y botones */
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .search-container input {
            width: 50%;
            padding: 8px;
        }

        .button-container {
            display: flex;
            gap: 10px;
        }

        /* Centrar la tabla */
        .table-container {
    display: flex;
    justify-content: center;
    width: 100%;
    max-width: 1000px; /* Limitar el ancho máximo del contenedor */
    margin: auto;
}


table {
    width: 100%; /* Asegúrate de que la tabla ocupe el 100% del contenedor */
    max-width: 100%; /* Limitar el ancho máximo de la tabla */
    border-collapse: collapse;
    table-layout: fixed;  /* Hace que las columnas tengan un tamaño fijo */
    width: 100%;  
    text-align: center;
    margin-top: 20px; /* Establece un margen superior pequeño */
    margin-bottom: 20px; /* Establece un margen inferior pequeño */

}
        .table-primary {
    background-color: #87CEEB !important; 
    border-color: #87CEEB 
        }

        table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
    word-wrap: break-word;  /* Esto evitará que el texto largo se desborde */
    max-width: 150px; /* Limitar el ancho máximo de cada celda */
}
        .modal-dialog {
            max-width: 30%;
        }

        .modal-body {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
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
        .btn-azul-cielo {
    background-color: #87CEEB !important; /* Azul cielo claro */
    border-color: #87CEEB !important;
    color: black !important; /* Texto en blanco para mejor contraste */
}

.btn-warning{
color: black !important;
}

.btn-azul-cielo:hover {
    background-color: #6CB6D9 !important; /* Un tono más oscuro al pasar el mouse */
    border-color: #6CB6D9 !important;
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
</head>
<div style="margin-left: -250px;">
<h1><strong>Inventario de Equipos de Cómputo</strong></h1>
    <div class="container">
        
        <!-- Contenedor de búsqueda y botones -->
        <div class="search-container">
            <input type="text" id="search" name="search" class="form-control" value="{{ request('search') }}" placeholder="Buscar" required oninput="validateInput(this)" maxlength="30" minlength="30"> 
            <div class="button-container">
            <button type="button" class="btn btn-azul-cielo" data-bs-toggle="modal" data-bs-target="#registerModal"><strong>Agregar</button></strong>
            <button class="btn btn-warning" id="generarReporte"><strong>Generar Reporte</strong></button>
                </div>
            <div class="col-sm-4">
            </div>
        </div>
        </div>
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

      <!-- Contador de registros -->
    <div class="d-flex justify-content-center my-3">
        <strong><h5>Mostrando {{ $inventarios->firstItem() }}–{{ $inventarios->lastItem() }} de {{ $inventarios->total() }} resultados</strong></h5>
    </div>

    <!-- Tabla de inventario -->
    <div class="table-container">
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
</div>

            <div class="d-flex justify-content-center">
            {{ $inventarios->links('pagination::bootstrap-4') }}
</div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const table = document.getElementById("inventarioTable");
        const tbody = table.getElementsByTagName("tbody")[0];
        const rows = tbody.getElementsByTagName("tr");
        const totalRegistros = document.getElementById("totalRegistros");

        searchInput.addEventListener("keyup", function () {
            let searchText = searchInput.value.toLowerCase();
            let count = 0;

            for (let row of rows) {
                let text = row.innerText.toLowerCase();
                if (text.includes(searchText)) {
                    row.style.display = "";
                    count++;
                } else {
                    row.style.display = "none";
                }
            }

            totalRegistros.innerText = count; 
        });
    });
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@endsection
