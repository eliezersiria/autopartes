<div>
    <p class="mb-2 text-sm text-gray-500">
        Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
    </p>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    <div class="overflow-x-auto">
        <x-table :headers="$headers" :rows="$categorias" with-pagination striped>
            @scope('actions', $row)
            <div class="flex space-x-2 justify-center">
                <x-button icon="o-pencil" wire:click="edit({{ $row->id }})" spinner class="btn-sm" />
                <x-button icon="o-trash" wire:click="delete({{ $row->id }})"
                    wire:confirm="¿Estás seguro de que deseas eliminar esta categoría {{ $row->nombre }}?" spinner
                    class="btn-sm" />
            </div>
            @endscope
        </x-table>
    </div>
</div>