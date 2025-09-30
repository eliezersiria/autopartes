<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('categoria');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostramos en formulario
        return view('categorias.agregar-categoria');
    }
}
