<div>
    
    <div class="card w-full">
        <p class="mb-2 text-sm text-gray-500"> <x-tiempo-carga /> </p>
        @if (session()->has('message'))
            <x-repuestos.mensajes-success mensaje="{{ session('message') }}" />
        @endif
        <div class="card-body">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                <legend class="badge badge-xl">AGREGAR REPUESTO @svg('heroicon-s-newspaper', 'w-5 h-5')</legend>
                <x-form wire:submit="saveRepuesto" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"
                    no-separator>
                    <div>
                        <x-input wire:model="codigo" label="Código" hint="Código del repuesto" icon="o-face-smile" />
                    </div>

                    <div>
                        <x-input wire:model.live="nombre" label="Nombre" hint="Nombre del repuesto" />
                    </div>

                    <div>
                        <x-input wire:model="marca" label="Marca" hint="Marca" />
                    </div>

                    <div>
                        <x-select label="Categoría" wire:model="categoria_id" :options="$categorias" icon="o-tag"
                            placeholder="Seleccionar categoría" class="select select-info" />
                    </div>

                    <div>
                        <x-choices label="Vehículo Compatible" wire:model="vehiculo_id" :options="$vehiculos"
                            icon="o-truck" placeholder="Buscar..." class="select select-info" searchable clearable single />
                    </div>

                    <div>
                        <x-select label="Proveedor" wire:model="proveedor_id" :options="$proveedores"
                            icon="o-face-smile" placeholder="Seleccionar proveedor" />
                    </div>

                    <div>
                        <x-input wire:model.live="precio_compra" label="Precio de compra" prefix="NIO"
                            hint="Precio de compra" type="number" />
                    </div>

                    <div>
                        <x-input wire:model="precio_venta" label="Precio de venta" value="{{ $precio_venta }}"
                            prefix="NIO" hint="Precio de venta 40% : {{ number_format($precio_venta, 2) }}" />
                    </div>

                    <div>
                        <x-input wire:model="stock" label="Cantidad" hint="Cantidad" type="number" />
                    </div>

                    <div>
                        <x-input label="URL" wire:model="url" hint="Max 1000 caracteres" readonly />
                    </div>

                    <div>
                        <x-input label="Descripción" wire:model="descripcion" placeholder="Escribir descripcion" />
                    </div>

                    <div wire:key="file-container-{{ $fileKey }}">
                        <x-file wire:model="thumb" accept="image/png, image/jpeg">
                            @if($thumb)
                                <img src="{{ $thumb->temporaryUrl() }}" class="h-40 rounded-lg" />
                            @else
                                <img src="{{ asset('storage/images/parts_default.webp') }}" class="h-40 rounded-lg" />
                            @endif
                        </x-file>
                    </div>

                    <div>
                        <x-button label="Guardar" class="btn-primary" type="submit" spinner="saveRepuesto"
                            icon="s-circle-stack" />
                        <x-button label="Cancelar" link="{{ route('repuestos') }}"
                            class="btn bg-yellow-600 hover:bg-yellow-700" />
                    </div>
                </x-form>

            </fieldset>
        </div>
    </div>
</div>