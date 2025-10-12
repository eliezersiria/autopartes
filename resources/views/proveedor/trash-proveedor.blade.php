@extends('layouts.base')

@section('title', 'Papelera - Proveedores')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-proveedor.proveedor-sidebar />
@endsection

@section('content')
    <livewire:proveedor.trash-proveedor />
@endsection