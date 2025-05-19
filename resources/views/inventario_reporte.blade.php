<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
<title>Reporte de Inventario</title>
    <style>
        .logo {
            text-align: right;
            margin-bottom: 5px;
        }

        .logo img {
            max-width: 120px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }

        thead {
            background-color: #d1e7dd;
        }

        /* Ocultar el botón cuando se imprima o genere el PDF */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="logo">
        <img src="images/logo.png" alt="Logo">
    </div>
    <h2 style="text-align: center;">Listado Completo de Equipos</h2>
    <div style="text-align: center; margin-bottom: 20px;">
        <button class="no-print" onclick="window.print()" style="padding: 8px 16px; margin-right: 10px;">🖨️ Guardar como PDF o Imprimir </button>
    </div>
    <table>
        <thead>
            <tr>
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
            </tr>
        </thead>
        <tbody>
            @foreach($inventarios as $inv)
                <tr>
                    <td>{{ $inv->TIPO_EQUIPO }}</td>
                    <td>{{ $inv->MARCA_MODELO }}</td>
                    <td>{{ $inv->FICHA }}</td>
                    <td>{{ $inv->INVENTARIO }}</td>
                    <td>{{ $inv->OFICINA }}</td>
                    <td>{{ $inv->ESTADO }}</td>
                    <td>{{ $inv->DISCO_DURO }}</td>
                    <td>{{ $inv->RAM }}</td>
                    <td>{{ $inv->OBSERVACIONES }}</td>
                    <td>{{ $inv->SERVICE_TAG }}</td>
                    <td>
                    @if($inv->ESTADO_ACTUAL == 1)
                        ACTIVO
                    @elseif($inv->ESTADO_ACTUAL == 0)
                        INACTIVO
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script>
    function exportToPDF() {
        const element = document.body; // puedes cambiarlo si quieres solo la tabla
        const opt = {
            margin:       0.3,
            filename:     'reporte_inventario.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
        };

        html2pdf().set(opt).from(element).save();
    }
</script>

</body>
</html>
