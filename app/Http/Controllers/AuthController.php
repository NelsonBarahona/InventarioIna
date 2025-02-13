<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('iniciosesion'); // Asegúrate de que esta vista existe en resources/views/iniciosesion.blade.php
    }
}
