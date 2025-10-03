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

    <div class="overflow-x-auto">

        @if(!$editMode)
            <!-- Tabla -->
            <x-table :headers="$headers" :rows="$categorias" with-pagination striped>
                @scope('actions', $row)
                <div class="flex space-x-2 justify-center">
                    <x-button icon="o-pencil" wire:click="edit({{ $row->id }})" spinner class="btn-sm" />
                    <x-button icon="o-trash" wire:click="delete({{ $row->id }})"
                        wire:confirm="¿Enviar a la papelera esta categoría {{ $row->nombre }}?" spinner class="btn-sm" />
                </div>
                @endscope
            </x-table>
        @else

            <!-- Formulario de edición -->
            <div class="p-4 border rounded">
                <h2 class="font-bold mb-2">Editar Categoría</h2>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model="nombre" class="input" />
                        @error('nombre')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <div class="mt-2 flex gap-2">
                            <!--button  class="btn btn-success" spinner>Actualizar</button-->
                            <x-button label="Guardar" type="submit" spinner="update" class="btn btn-success" />
                            <button type="button" wire:click="cancelar" class="btn btn-warning">Cancelar</button>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Actualizado {{ $actualizado->diffForHumans() }}</p>
                        <p class="mt-2 text-sm text-gray-500">El
                            {{ $actualizado->translatedFormat('l d \d\e F \d\e Y h:i a') }}
                        </p>
                    </form>
                </fieldset>
            </div>

        @endif


    </div>


</div>