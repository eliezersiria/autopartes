<div>
    <div class="card w-full lg:w-1/2">
        <div class="card-body">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                <legend class="badge badge-xl">Agregar Proveedor</legend>
                <div wire:loading.class="opacity-50 pointer-events-none">
                    <x-form wire:submit="saveProveedor">
                        <x-input label="Nombre" wire:model="nombre" hint="Introducir nombre del Proveedor" />
                        <x-input label="Telefono" wire:model="telefono" hint="Número de teléfono del Proveedor"
                            type="number" />
                        <x-input label="Email" wire:model="email" />
                        <x-textarea label="Direccion" wire:model="direccion" placeholder="Escribir direccion"
                            hint="Max 1000 caracteres" rows="5" />
                        <x-slot:actions>
                            <x-button label="Guardar" class="btn-primary" type="submit" spinner="saveProveedor" />
                        </x-slot:actions>
                    </x-form>
                    @if (session()->has('message'))
                        <x-categorias.mensajes-success mensaje="{{ session('message') }}" />
                    @endif
                </div>
            </fieldset>
        </div>
    </div>
</div>