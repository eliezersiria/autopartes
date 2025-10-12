<div>
    <p class="mb-2 text-sm text-gray-500">
        Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
    </p>

    <x-card title="Proveedores Eliminados" subtitle="Papelera de reciclaje">

        @if ($proveedores->isNotEmpty())
            @foreach($proveedores as $proveedor)
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                    <x-card title="{{ $proveedor->nombre }}"
                        subtitle="Eliminado el {{ $proveedor->deleted_at->translatedFormat('l d \d\e F \d\e Y h:i a') }}">
                        <x-button class="btn-sm bg-green-700 hover:bg-green-600 text-white" label="Restaurar"
                            icon="o-arrow-path" wire:click="restore({{ $proveedor->id }})" spinner="restore({{ $proveedor->id }})" />
                        <x-button class="btn-sm bg-red-700 hover:bg-red-600 text-white" label="Eliminar definitivamente"
                            wire:click="abrirModalForceDelete({{ $proveedor->id }}, '{{ $proveedor->nombre }}')" icon="o-trash" spinner />
                    </x-card>
                </fieldset>
            @endforeach
        @else
            <p class="text-center">No hay categorías eliminadas.</p>
        @endif

    </x-card>

    <!-- MODAL DE DESTROY-->
    <div>
        <x-modal wire:model="showModalForceDelete" title="Eliminar"
            subtitle="Desea eliminar completamente la categoría {{$provNombre }}?">
            <x-slot:actions>
                <x-button class="btn-sm bg-red-700 hover:bg-red-600 text-white" label="Aceptar"
                    wire:click="forceDelete({{ $proveedor_id }})" icon="o-check" spinner="forceDelete" />
                <x-button class="btn btn-sm" label="Cancelar" wire:click="$set('showModalForceDelete', false)"
                    icon="o-x-circle" />
            </x-slot:actions>
        </x-modal>
    </div>


</div>
