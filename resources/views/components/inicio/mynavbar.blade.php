<x-header title="Bienvenido" :subtitle="view('components.tiempo-carga')" separator>
  <x-slot:actions>

    <x-card>
      <ul class="menu menu-horizontal bg-base-200 rounded-box">
        <x-menu-item wire:navigate icon="o-home" href="{{ route('dashboard') }}"
          :active="request()->routeIs('dashboard')" :class="request()->routeIs('dashboard') ? 'bg-primary text-white' : ''">
          Inicio
        </x-menu-item>

        <x-menu-item icon="o-cube" wire:navigate href="{{ route('categoria') }}"
          :active="request()->routeIs('categoria*')" :class="request()->routeIs('categoria*') ? 'bg-primary text-white' : ''">
          Categorías
        </x-menu-item>

        <x-menu-item icon="o-user-group" wire:navigate href="{{ route('proveedores') }}"
          :active="request()->routeIs('proveedores*')" :class="request()->routeIs('proveedores*') ? 'bg-primary text-white' : ''">
          Proveedores
        </x-menu-item>

        <x-menu-item icon="o-cog-8-tooth" href="#">Configuración</x-menu-item>
      </ul>
    </x-card>


    {{-- Use `right` if dropdown is on right side of screen --}}
    <x-dropdown label="{{ auth()->user()->name }}" class="btn-warning" right>
      <x-menu-item title="Configuración" icon="o-cog-8-tooth" />
      <x-form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="flex items-center gap-2 px-4 py-2 cursor-pointer"> <x-iconpark-home
            class="w-4 h-4" /> Cerrar sesión</button>
      </x-form>
    </x-dropdown>
  </x-slot:actions>
</x-header>