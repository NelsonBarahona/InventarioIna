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
}