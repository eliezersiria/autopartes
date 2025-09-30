<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Cerrar sesión y redirigir al login.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario

        // Invalida la sesión
        $request->session()->invalidate();
        $request->session()->regenerateToken();
         // Mensaje flash
        session()->flash('message', 'Has cerrado sesión correctamente.');
        // Redirigir al login (o página principal)
        return redirect()->route('login');
    }
}
