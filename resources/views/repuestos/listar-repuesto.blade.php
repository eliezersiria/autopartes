@extends('layouts.base')

@section('title', 'Ver Repuestos')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-repuestos.repuestos-sidebar />
@endsection

@section('content')
    <livewire:repuesto.show-repuestos />
@endsection