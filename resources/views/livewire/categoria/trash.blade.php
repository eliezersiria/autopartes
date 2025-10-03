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
                    <x-card title="{{ $cat->nombre }}" subtitle="Eliminado el {{ $cat->deleted_at->translatedFormat('l d \d\e F \d\e Y h:i a') }}">
                        <x-button class="bg-green-700 hover:bg-green-600 text-white" label="Restaurar" icon="o-arrow-path"
                            wire:click="restore({{ $cat->id }})" spinner/>
                        <x-button class="bg-red-700 hover:bg-red-600 text-white" label="Eliminar definitivamente" icon="o-trash"
                            wire:click="forceDelete({{ $cat->id }})" wire:confirm="¿Estás seguro de que deseas eliminar este registro?" spinner/>
                    </x-card>
                </fieldset>
            @endforeach
        @else
            <p class="text-center">No hay categorías eliminadas.</p>
        @endif

    </x-card>
</div>