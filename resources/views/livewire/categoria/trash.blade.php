<div>
    <p class="mb-2 text-sm text-gray-500">
        Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
    </p>
    @if (session()->has('success'))
        <x-categorias.mensajes-success mensaje="{{ session('success') }}" />
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <x-card title="Categorías Eliminadas" subtitle="Papelera de reciclaje">

        @if ($categorias->isNotEmpty())
            @foreach($categorias as $cat)
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                    <x-card title="{{ $cat->nombre }}"
                        subtitle="Eliminado el {{ $cat->deleted_at->translatedFormat('l d \d\e F \d\e Y h:i a') }}">
                        <x-button class="btn-sm bg-green-700 hover:bg-green-600 text-white" label="Restaurar"
                            icon="o-arrow-path" wire:click="restore({{ $cat->id }})" spinner />
                        <x-button class="btn-sm bg-red-700 hover:bg-red-600 text-white" label="Eliminar definitivamente"
                            wire:click="abrirModalForceDelete({{ $cat->id }}, '{{ $cat->nombre }}')" icon="o-trash" spinner />
                    </x-card>
                </fieldset>
            @endforeach
        @else
            <p class="text-center">No hay categorías eliminadas.</p>
        @endif

    </x-card>

    <div>
        <x-modal wire:model="showModalForceDelete" title="Eliminar"
            subtitle="Desea eliminar completamente la categoría {{$catNombre }}?">
            <x-slot:actions>
                <x-button class="btn-sm bg-red-700 hover:bg-red-600 text-white" label="Aceptar"
                    wire:click="forceDelete({{ $idSeleccionado }})" icon="o-check" spinner="forceDelete" />
                <x-button class="btn btn-sm" label="Cancelar" wire:click="$set('showModalForceDelete', false)"
                    icon="o-x-circle" />
            </x-slot:actions>
        </x-modal>
    </div>
</div>