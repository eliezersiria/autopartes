<x-menu class="border border-base-content/10">
    <x-menu-item title="Agregar Repuesto" icon="o-plus-circle" wire:navigate href="{{ route('repuestos.crear') }}"
        :active="request()->routeIs('repuestos.crear')" :class="request()->routeIs('repuestos.crear') ? 'bg-primary text-white' : ''" />

    <x-menu-item title="Ver Repuestos" icon="o-list-bullet" wire:navigate href="{{ route('repuestos.show') }}"
        :active="request()->routeIs('repuestos.show')" :class="request()->routeIs('repuestos.show') ? 'bg-primary text-white' : ''" />

    <x-menu-item title="Papelera" icon="o-trash" wire:navigate href="{{ route('proveedores.trash') }}"
        :active="request()->routeIs('proveedores.trash')" :class="request()->routeIs('proveedores.trash') ? 'bg-primary text-white' : ''" />
</x-menu>