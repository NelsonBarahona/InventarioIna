<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todos los registros del inventario
        $inventarios = Inventario::all();
        $inventarios = Inventario::paginate(10); // Muestra 10 registros por página

        return view('inventario', compact('inventarios'));
    }
}