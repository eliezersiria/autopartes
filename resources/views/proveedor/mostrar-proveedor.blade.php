@extends('layouts.base')

@section('title', 'Lista de Proveedores')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-proveedor.proveedor-sidebar />
@endsection

@section('content')
    <livewire:proveedor.show-proveedores />
@endsection