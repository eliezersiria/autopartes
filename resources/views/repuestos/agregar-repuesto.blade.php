@extends('layouts.base')

@section('title', 'Agregar Repuesto')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-repuestos.repuestos-sidebar />
@endsection

@section('content')
    <livewire:repuesto.agregar-repuesto />
@endsection