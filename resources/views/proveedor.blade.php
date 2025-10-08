@extends('layouts.base')

@section('title', 'Proveedores')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-proveedor.proveedor-sidebar />
@endsection

@section('content')
    <div>
        <div class="hero bg-base-200 min-h-screen">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Administrar Proveedores</h1>
                    <p class="py-6">
                        Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                        quasi. In deleniti eaque aut repudiandae et a id nisi.
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>
    </div>
@endsection