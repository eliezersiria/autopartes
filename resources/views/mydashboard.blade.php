@extends('layouts.base')

@section('title', 'Bienvenido')

@section('navbar')
    <x-inicio.mynavbar />
@endsection

@section('sidebar')
    <x-inicio.mysidebar />
@endsection

@section('content')
    <livewire:dashboard />
@endsection