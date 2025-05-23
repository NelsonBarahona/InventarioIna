@section('content')
<div class="container">
    <h3>Subir Archivos para el equipo: {{ $inventario->TIPO_EQUIPO }} - {{ $inventario->SERVICE_TAG }}</h3>

    <form action="{{ route('inventario.guardarArchivos', $inventario->ID_EQUIPO) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="archivo" class="form-label">Selecciona un archivo:</label>
            <input type="file" name="archivo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Subir</button>
    </form>
</div>
@endsection