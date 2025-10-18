<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepuestoController extends Controller
{
    public function index()
    {
        return view('repuestos');
    }

    public function create()
    {
        return view('repuestos.agregar-repuesto');
    }

    public function show()
    {
        return view('repuestos.listar-repuesto');
    }
}
