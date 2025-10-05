<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="container mx-auto">

    <div class="grid grid-rows-[auto_1fr] md:grid-cols-[250px_1fr] h-screen">
        <!-- Navbar -->
        <div class="border p-4 md:col-span-2">
            @yield('navbar')
        </div>
        <!-- SIDEBAR -->
        <div class="border p-4 mt-2">
            <div class="flex-1">
                @yield('sidebar')
            </div>
        </div>

        <!-- Main content -->
        <div class="border p-4 mt-2">
            @yield('content')
        </div>
    </div>
    @livewireScripts
    <x-toast />
</body>

</html>