<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('inicioSesion');
    }

    public function login(Request $request)
{
    $request->validate([
        'NOM_USUARIO' => 'required',
        'CONTRASENA' => 'required',
    ]);

    
    $usuario = Usuario::where('NOM_USUARIO', $request->NOM_USUARIO)->first();

    if ($usuario && Hash::check($request->CONTRASENA, $usuario->CONTRASENA)) {
        Auth::login($usuario); 
        $request->session()->regenerate();
        return redirect()->route('inventario');
    }

    return back()->withErrors(['message' => 'Credenciales inválidas']);
}
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken(); // Regenera el token de sesión por seguridad

    return redirect()->route('login');
}

public function inventario(Request $request)
{
    if (Auth::check()) {
        return view('inventario');
    }

    return redirect()->route('login');
}
   
}
