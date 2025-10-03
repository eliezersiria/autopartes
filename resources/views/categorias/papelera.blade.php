@extends('layouts.base')

@section('title', 'Papelera')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-categorias.categoria-sidebar />
@endsection

@section('content')
    <livewire:categoria.trash />
@endsection