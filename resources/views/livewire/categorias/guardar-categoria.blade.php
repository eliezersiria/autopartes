<div>
    <div class="hero bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Agregar Categoría</h1>
                <p class="py-6">
                    En esta sección podrá agregar categorías de repuestos de vehículos.
                    En esta sección podrá agregar categorías de repuestos de vehículos.
                    En esta sección podrá agregar categorías de repuestos de vehículos.
                </p>
            </div>
            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
                <div class="card-body">
                    <fieldset class="fieldset">
                        <x-form wire:submit.prevent="save" no-separator>
                            <x-input label="Nombre de categoría" placeholder="Categoría" wire:model="nombre" type="text"
                                :error="$errors->first('nombre')" hint="Introduzca nombre de la categoría" />
                            <x-button label="Guardar" type="submit" class="btn btn-neutral mt-4" spinner="save" />
                            <!-- Mostrar mensaje de éxito -->
                            @if (session()->has('message'))
                                <x-categorias.mensajes-success mensaje="{{ session('message') }}"/>
                            @endif
                        </x-form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>