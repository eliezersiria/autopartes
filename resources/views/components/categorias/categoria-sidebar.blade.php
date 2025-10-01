<x-menu class="border border-base-content/10">
    <x-menu-item title="Agregar Categoria" icon="o-plus-circle" wire:navigate href="{{ route('categoria.crear') }}"
        :active="request()->routeIs('categoria.crear')" :class="request()->routeIs('categoria.crear') ? 'bg-primary text-white' : ''" />

    <x-menu-item title="Ver Categorias" icon="o-list-bullet" wire:navigate href="{{ route('categoria.show') }}"
        :active="request()->routeIs('categoria.show')" :class="request()->routeIs('categoria.show') ? 'bg-primary text-white' : ''" />
    <x-menu-item title="Papelera" icon="o-trash" />
</x-menu>