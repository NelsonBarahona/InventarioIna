<?php
namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventarioExport;
use Illuminate\Support\Facades\Storage;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index(Request $request)
    {
        $query = Inventario::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('ID_EQUIPO', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('TIPO_EQUIPO', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('MARCA_MODELO', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('FICHA', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('INVENTARIO', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('OFICINA', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('ESTADO', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('DISCO_DURO', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('RAM', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('OBSERVACIONES', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('SERVICE_TAG', 'LIKE', "%{$searchTerm}%");
            });
        }
// Ordenar por ID_EQUIPO (mayor o menor)
    if ($request->has('sort') && $request->sort == 'asc') {
        $query->orderBy('ID_EQUIPO', 'asc'); // menor a mayor
    } else {
        $query->orderBy('ID_EQUIPO', 'desc'); // mayor a menor (por defecto)
    }

    // Paginación
    $inventarios = $query->paginate(6); // O el número que uses

    return view('inventario', compact('inventarios'));
}
    
    public function agregar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
        'tipoequipo' => 'nullable|string|max:255',
        'marcamodelo' => 'nullable|string|max:255', // No es obligatorio
        'ficha' => 'nullable|string|max:255|unique:tbl_equipos,FICHA', // No es obligatorio
        'inventario' => 'nullable|string|max:255|unique:tbl_equipos,INVENTARIO', // No es obligatorio
        'oficina' => 'nullable|string|max:255', // No es obligatorio
        'estado' => 'nullable|string|max:255', // No es obligatorio
        'discoduro' => 'nullable|string|max:255', // No es obligatorio
        'ram' => 'nullable|string|max:255', // No es obligatorio
        'observaciones' => 'nullable|string|max:255', // No es obligatorio
        'servicetag' => 'nullable|string|max:255|unique:tbl_equipos,SERVICE_TAG',
], [
    'servicetag.unique' => 'Este número de serie ya ha sido registrado en el sistema. Por favor, ingrese uno diferente.',
    'ficha.unique' => 'Esta ficha ya está registrada. Por favor, verifique o ingrese una nueva.',
    'inventario.unique' => 'Este número de inventario ya existe en el sistema. Ingrese un número distinto, por favor.',
    
]);
      
        // Crear una nueva instancia del modelo Inventario
        $inventarios = new Inventario();
    
        // Asignar valores a los campos, convirtiendo los valores nulos a vacíos
    $inventarios->TIPO_EQUIPO = $request->tipoequipo ?? ''; // Si es nulo, se asigna una cadena vacía
    $inventarios->MARCA_MODELO = $request->marcamodelo ?? '';
    $inventarios->FICHA = $request->ficha ?? '';
    $inventarios->INVENTARIO = $request->inventario ?? '';
    $inventarios->OFICINA = $request->oficina ?? '';
    $inventarios->ESTADO = $request->estado ?? '';
    $inventarios->DISCO_DURO = $request->discoduro ?? '';
    $inventarios->RAM = $request->ram ?? '';
    $inventarios->OBSERVACIONES = $request->observaciones ?? '';
    $inventarios->SERVICE_TAG = $request->servicetag ?? '';
    $inventarios->ESTADO_ACTUAL = 1; // Si deseas establecer un estado por defecto

    
        // Guardar la nueva entrada en la base de datos
        $inventarios->save();
        
         // Usar flash para pasar el mensaje
    session()->flash('swal_message', 'El equipo ha sido agregado exitosamente.');
    
          // Redirigir sin pasar mensaje tradicional, solo con SweetAlert
    return redirect()->route('inventario.agregar');
    }
   public function actualizar(Request $request, $id)
{
    
    $inventario = Inventario::findOrFail($id);

    $request->validate([
        'archivo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:5048'
    ]);

    if ($request->hasFile('archivo')) {
        $archivo = $request->file('archivo');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

        // Guardar archivo en storage/app/public/documentos
        $rutaCarpetaStorage = storage_path('app/public/documentos');
        $archivo->move($rutaCarpetaStorage, $nombreArchivo);

        // Guardar la ruta relativa
        $inventario->ARCHIVO = 'storage/documentos/' . $nombreArchivo;
    }

    $inventario->save();

    session()->flash('swal_message', 'El archivo se ha subido exitosamente');
    return redirect()->back();
}

public function inactivar(request $request, $id)
{
   
    try {
        $inventarios = Inventario::findOrFail($id);
        $inventarios->ESTADO_ACTUAL = 0;
        $inventarios->save();

        // Retorna una respuesta de éxito
        return response()->json(['success' => true, 'message' => 'El equipo ha sido inactivado exitosamente']);
    } catch (\Exception $e) {
        // Si ocurre algún error, maneja la excepción y retorna una respuesta de error en formato JSON
        return response()->json(['success' => false, 'message' => 'Ocurrió un error al inactivar el Equipo']);
    }
}
public function reporteCompleto()
{
    $inventarios = Inventario::all(); // Todos los registros sin paginar
    return view('inventario_reporte', compact('inventarios'));
}

public function subirArchivos($id)
{
    $inventario = Inventario::findOrFail($id);
    return view('inventario.subir', compact('inventario'));
}
public function guardarArchivo(Request $request, $id)
{
    if ($request->hasFile('archivo')) {
        $archivo = $request->file('archivo');
        $nombre = time() . '_' . $archivo->getClientOriginalName();
        $ruta = $archivo->storeAs('documentos_inventario', $nombre, 'public');

        // Aquí podrías guardar la ruta en la base de datos si quieres
        // Ejemplo: ArchivoInventario::create([...]);

        return back()->with('success', 'Archivo subido exitosamente.');
    }

    return back()->with('error', 'No se pudo subir el archivo.');
}

public function borrarArchivo($id)
{
    $inventario = Inventario::findOrFail($id);

    if ($inventario->ARCHIVO) {
        // La ruta guardada es tipo 'storage/documentos/nombre.ext'
        // La ruta para Storage disk 'public' es 'documentos/nombre.ext'
        $rutaArchivo = str_replace('storage/', '', $inventario->ARCHIVO);

        // Verificamos si el archivo existe y lo borramos
        if (Storage::disk('public')->exists($rutaArchivo)) {
            Storage::disk('public')->delete($rutaArchivo);
        }

        // Limpiamos el campo en la BD
        $inventario->ARCHIVO = null;
        $inventario->save();

        return back()->with('success', 'Archivo eliminado correctamente.');
    }

    return back()->with('error', 'No hay archivo para eliminar.');
}
}





