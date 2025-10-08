@extends('layouts.base')

@section('title', 'Proveedores')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-proveedor.proveedor-sidebar />
@endsection

@section('content')
    <livewire:proveedor.agregar-proveedor />
@endsection