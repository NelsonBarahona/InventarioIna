<?php
namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

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

        // Obtener los inventarios con paginación
        $inventarios = $query->paginate(10);

        return view('inventario', compact('inventarios'));
    }

    
    public function agregar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
        'tipoequipo' => 'required|string|max:255',
        'marcamodelo' => 'nullable|string|max:255', // No es obligatorio
        'ficha' => 'nullable|string|max:255', // No es obligatorio
        'inventario' => 'nullable|string|max:255', // No es obligatorio
        'oficina' => 'nullable|string|max:255', // No es obligatorio
        'estado' => 'nullable|string|max:255', // No es obligatorio
        'discoduro' => 'nullable|string|max:255', // No es obligatorio
        'ram' => 'nullable|string|max:255', // No es obligatorio
        'observaciones' => 'nullable|string|max:255', // No es obligatorio
        'servicetag' => 'nullable|string|max:255', // No es obligatorio
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
    
}
