<!DOCTYPE html>
<html lang="en">
@extends('menu')
@section('title', 'Inventario')
@section('content')
<head>  
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
    table-layout: auto;  /* Cambiar de fixed a auto */
}

table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
    word-wrap: break-word;
    text-align: center;
}
    .table-primary {
        background-color: #87CEEB !important; 
        border-color: #87CEEB;
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
            <a href="{{ route('inventario.reporte') }}" target="_blank" class="btn btn-warning fw-bold">
    Generar Reporte Completo
</a>

        </div>
    </div>  
</form>

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error }}</li>
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

<table class="table table-bordered table-hover" id="inventarioTable">
    

    <thead class="table-primary">
        <tr>
            <th hidden>Código</th>
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
                <td hidden>{{ $inventario->ID_EQUIPO }}</td>
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
        <i class="fas fa-search"></i> <!-- Cambié fa-pencil-alt por fa-search -->
    </button>
                    <br>
                    <br>
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
     <!-- Modal para agregar un nuevo equipo -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header" style="background-color: #87CEEB; color: white;">
            <h5 class="modal-title" id="registerModalLabel" style="color: black;"><strong>Agregar Equipo</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: white; color: black;">
                <form id="registerForm" method="POST" action="{{ route('inventario.agregar') }}">
    @csrf
                    <xbr>
                        <div class="form-group">
                            <label for="tipoequipo">Tipo de Equipo:</label>
                            <input type="text" class="form-control" id="tipoequipo" name="tipoequipo"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="marcamodelo">Marca/Modelo:</label>
                            <input type="text" class="form-control" id="marcamodelo" name="marcamodelo"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="ficha">Ficha:</label>
                            <input type="text" class="form-control" id="ficha" name="ficha"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="inventario">Inventario:</label>
                            <input type="text" class="form-control" id="inventario" name="inventario"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="oficina">Oficina:</label>
                            <input type="text" class="form-control" id="oficina" name="oficina"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="discoduro">Disco Duro:</label>
                            <input type="text" class="form-control" id="discoduro" name="discoduro"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="ram">Ram:</label>
                            <input type="text" class="form-control" id="ram" name="ram"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="observaciones">Observaciones:</label>
                            <input type="text" class="form-control" id="observaciones" name="observaciones"required oninput="validateInput(this)" ><br>
                        </div>
                        <div class="form-group">
                            <label for="servicetag">Service Tag:</label>
                            <input type="text" class="form-control" id="servicetag" name="servicetag"required oninput="validateInput(this)" ><br>
                        </div>
                        <button type="submit" class="btn btn-azul-cielo"><strong>Guardar</strong></button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
        @foreach ($inventarios as $inventario)
    <!-- Modal con ID único por equipo -->
    <div class="modal fade" id="editarModal{{ $inventario->ID_EQUIPO }}" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #87CEEB; color: black;">
                    <h5 class="modal-title" id="editarModalLabel"><strong>Visualizacion de registros</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="editarForm{{ $inventario->ID_EQUIPO }}" action="{{ route('inventario.actualizar', ['id' => $inventario->ID_EQUIPO]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campo solo de lectura, con valor enviado a través de un campo oculto -->
                        <div class="mb-3">
    <label class="form-label">Tipo de Equipo</label>
    <input type="text" class="form-control text-dark" value="{{ $inventario->TIPO_EQUIPO }}" readonly>
    <input type="hidden" name="TIPO_EQUIPO" value="{{ $inventario->TIPO_EQUIPO }}">
</div>

<div class="mb-3">
    <label class="form-label">Marca/Modelo</label>
    <input type="text" class="form-control text-dark" value="{{ $inventario->MARCA_MODELO }}" readonly>
    <input type="hidden" name="MARCA_MODELO" value="{{ $inventario->MARCA_MODELO }}">
</div>

<div class="mb-3">
    <label class="form-label">Ficha</label>
    <input type="text" class="form-control text-dark" value="{{ $inventario->FICHA }}" readonly>
    <input type="hidden" name="FICHA" value="{{ $inventario->FICHA }}">
</div>

<div class="mb-3">
    <label class="form-label">Inventario</label>
    <input type="text" class="form-control text-dark" value="{{ $inventario->INVENTARIO }}" readonly>
    <input type="hidden" name="INVENTARIO" value="{{ $inventario->INVENTARIO }}">
</div>

<div class="mb-3">
    <label for="oficina" class="form-label">Oficina:</label>
    <input type="text" value="{{ $inventario->OFICINA }}" class="form-control text-dark" id="oficina" name="oficina" readonly>
    <input type="hidden" name="OFICINA" value="{{ $inventario->OFICINA }}">
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Estado:</label>
    <input type="text" value="{{ $inventario->ESTADO }}" class="form-control text-dark" id="estado" name="estado" readonly>
    <input type="hidden" name="ESTADO" value="{{ $inventario->ESTADO }}">
</div>

<div class="mb-3">
    <label for="discoduro" class="form-label">Disco Duro:</label>
    <input type="text" value="{{ $inventario->DISCO_DURO }}" class="form-control text-dark" id="discoduro" name="discoduro" readonly>
    <input type="hidden" name="DISCO_DURO" value="{{ $inventario->DISCO_DURO }}">
</div>

<div class="mb-3">
    <label for="ram" class="form-label">Ram:</label>
    <input type="text" value="{{ $inventario->RAM }}" class="form-control text-dark" id="ram" name="ram" readonly>
    <input type="hidden" name="RAM" value="{{ $inventario->RAM }}">
</div>

<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones:</label>
    <input type="text" value="{{ $inventario->OBSERVACIONES }}" class="form-control text-dark" id="observaciones" name="observaciones" readonly>
    <input type="hidden" name="OBSERVACIONES" value="{{ $inventario->OBSERVACIONES }}">
</div>

<div class="mb-3">
    <label class="form-label">Service Tag</label>
    <input type="text" class="form-control text-dark" value="{{ $inventario->SERVICE_TAG }}" readonly>
    <input type="hidden" name="SERVICE_TAG" value="{{ $inventario->SERVICE_TAG }}">
</div>


                   
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
    document.getElementById('ordenar').addEventListener('change', function() {
        const orden = this.value;
        const search = document.getElementById('search')?.value || '';
        const baseUrl = window.location.href.split('?')[0];

        // Construye la nueva URL con parámetros
        let nuevaUrl = `${baseUrl}?`;

        if (search !== '') {
            nuevaUrl += `search=${encodeURIComponent(search)}&`;
        }

        if (orden !== '') {
            nuevaUrl += `orden=${orden}&`;
        }

        window.location.href = nuevaUrl.slice(0, -1); // Elimina el último "&"
    });
</script>

<script>
function validateInput(input) {
    // Convertir a mayúsculas
    input.value = input.value.toUpperCase();

    }
</script>

<script>
    document.querySelectorAll('.delete').forEach(button => {
        button.addEventListener('click', function() {
            const inventarioId = this.getAttribute('data-inventario-id');

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Seguro que deseas inactivar este Equipo',
                imageUrl: 'images/logo.png',
                imageWidth: 100, 
                imageHeight: 100, 
                imageAlt: 'Logo', 
                showCancelButton: true,
                confirmButtonColor: '#007bff', // Color azul
                confirmButtonText: 'Aceptar',
                cancelButtonColor: '#ffc107', // Color amarillo
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/inventario/inactivar/${inventarioId}`, {
    method: 'PUT',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({}) // importante si usas PUT
})

                    .then(response => {
                        if (!response.ok) {
                            throw new Error('La solicitud de inactivacion del Equipo falló');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Éxito!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Advertencia!',
                                text: data.message,
                                icon: 'warning',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrió un error al intentar inactivar el Equipo',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    });
                }
            });
        });
    });
</script>
<script>
    $('#generarReporte').click(function () {
        var table = $('#inventarioTable').DataTable();
        var data = table.rows({ search: 'applied' }).data(); // <-- Todos los resultados filtrados, sin importar la página

        var tbodyContent = '';

        for (var i = 0; i < data.length; i++) {
            var row = data[i];
            tbodyContent += `<tr>
                <td>${row[1]}</td>
                <td>${row[2]}</td>
                <td>${row[3]}</td>
                <td>${row[4]}</td>
                <td>${row[5]}</td>
                <td>${row[6]}</td>
                <td>${row[7]}</td>
                <td>${row[8]}</td>
                <td>${row[9]}</td>
                <td>${row[10]}</td>
                <td>${row[11]}</td>
            </tr>`;
        }

        var contenido = `
        <html>
            <head>
                <title>INSTITUTO NACIONAL AGRARIO</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 20px; }
                    h1 { text-align: center; margin-top: 10px; }
                    .container { padding: 30px; }
                    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
                    th, td { border: 2px solid #ddd; padding: 5px; text-align: left; }
                    th { background-color: #4e9ce4; color: white; }
                    tr:hover { background-color: #f2f2f2; }
                    .logo { text-align: right; margin-bottom: 5px; }
                    .logo img { max-width: 120px; }
                </style>
            </head>
            <body>
                <div class="logo">
                    <img src="images/logo.png" alt="Logo">
                </div>
                <h1>Listado de Equipos</h1>
                <div class="container">
                    <table>
                        <thead>
                            <tr>
                                <th>Tipo de Equipo</th>
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
                            </tr>
                        </thead>
                        <tbody>
                            ${tbodyContent}
                        </tbody>
                    </table>
                </div>
            </body>
        </html>`;

        var temporalDocument = document.createElement('iframe');
        temporalDocument.setAttribute('style', 'visibility:hidden;position:absolute;width:0;height:0;');
        document.body.appendChild(temporalDocument);
        temporalDocument.contentWindow.document.open();
        temporalDocument.contentWindow.document.write(contenido);
        temporalDocument.contentWindow.document.close();

        setTimeout(() => {
            temporalDocument.contentWindow.focus();
            temporalDocument.contentWindow.print();
            document.body.removeChild(temporalDocument);
        }, 1000);
    });
</script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection 
