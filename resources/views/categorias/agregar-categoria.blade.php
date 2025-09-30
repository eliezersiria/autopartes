@extends('layouts.base')

@section('title', 'Agregar Categoria de Repuestos')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-categorias.categoria-sidebar />
@endsection

@section('content')
    <livewire:categorias.guardar-categoria />
@endsection