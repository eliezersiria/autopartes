<x-menu class="border border-base-content/10">
    <x-menu-item title="Agregar Proveedor" icon="o-plus-circle" wire:navigate href="{{ route('proveedores.crear') }}"
        :active="request()->routeIs('proveedores.crear')" :class="request()->routeIs('proveedores.crear') ? 'bg-primary text-white' : ''" />

    <x-menu-item title="Ver Proveedores" icon="o-list-bullet" wire:navigate href="{{ route('proveedores.show') }}"
        :active="request()->routeIs('proveedores.show')" :class="request()->routeIs('proveedores.show') ? 'bg-primary text-white' : ''" />

    <x-menu-item title="Papelera" icon="o-trash" wire:navigate href="{{ route('categoria.trash') }}"
        :active="request()->routeIs('categoria.trash')" :class="request()->routeIs('categoria.trash') ? 'bg-primary text-white' : ''" />
</x-menu>