@extends('layouts.base')

@section('title', 'Listar Categorias')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-categorias.categoria-sidebar />
@endsection

@section('content')
    <livewire:categorias.show-categorias />
@endsection