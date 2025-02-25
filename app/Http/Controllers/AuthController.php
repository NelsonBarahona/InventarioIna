<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('inicioSesion');
    }

    public function login(Request $request)
    {
        // Validación de campos
        $request->validate([
            'NOM_USUARIO' => 'required',
            'CONTRASENA' => 'required',
        ]);

        // Obtener usuario por nombre de usuario
        $usuario = Usuario::where('NOM_USUARIO', $request->NOM_USUARIO)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($usuario && Hash::check($request->CONTRASENA, $usuario->CONTRASENA)) {
            // Almacenar datos en la sesión
            $request->session()->put('usuario', $usuario);

            // Redirigir al inventario
            return redirect()->route('inventario');
        }

        // Si las credenciales son incorrectas, mostrar mensaje de error
        return back()->withErrors(['message' => 'Credenciales inválidas']);
    }

    public function logout(Request $request)
    {
        // Cerrar sesión
        $request->session()->forget('usuario');
        return redirect()->route('login');
    }

    public function inventario(Request $request)
    {
        // Verificar si hay usuario autenticado en sesión
        if ($request->session()->has('usuario')) {
            return view('inventario');
        }

        // Si no hay sesión, redirigir al login
        return redirect()->route('login');
    }
   
}
