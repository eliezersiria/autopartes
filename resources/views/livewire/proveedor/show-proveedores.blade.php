<div>
    <div class="overflow-x-auto">
        @if(!$editMode)
            <p class="mb-2 text-sm text-gray-500">
                Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
            </p>
            @if (session()->has('success'))
                <x-categorias.mensajes-success mensaje="{{ session('success') }}" />
            @endif
            <span class="badge badge-xl">Lista de Proveedores</span>
            <!-- Tabla -->
            <table class="table table-xs">
                <thead>
                    <tr>
                        <th></th>
                        <th>Proveedor</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Creado</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr class="hover:bg-base-300">
                            <td>{{ $proveedor->id }}</td>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->email }}</td>
                            <td>{{ Str::limit($proveedor->direccion, 15, '...') }}</td>
                            <td>{{ $proveedor->created_at->translatedFormat('l d \d\e F \d\e Y h:i a') }}</td>
                            <td>
                                <x-button class="btn btn-sm bg-green-700 hover:bg-green-600 text-white px-2 py-1 text-xs"
                                    icon="o-pencil" tooltip="Editar" wire:click="edit({{ $proveedor->id }})" spinner />
                            </td>
                            <td>
                                <x-button class="btn btn-sm bg-red-700 hover:bg-red-600 text-white px-2 py-1 text-xs"
                                    icon="o-trash" tooltip="Enviar a la Papelera" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="fab">
                <!-- a focusable div with tabindex is necessary to work on all browsers. role="button" is necessary for accessibility -->
                <div tabindex="0" role="button" class="btn btn-lg btn-circle btn-primary">F</div>

                <!-- buttons that show up when FAB is open -->
                <button class="btn btn-lg btn-circle">A</button>
                <button class="btn btn-lg btn-circle">B</button>
                <button class="btn btn-lg btn-circle">C</button>
            </div>
            
        @else
            <!-- Formulario de edición -->
            <div class="p-4 rounded w-full lg:w-1/2">
                <x-button label="Regresar" class="btn btn-sm" icon="s-arrow-left" wire:click="regresar"
                    spinner="regresar" />
                <hr class="border-t border-gray-300 my-4">
                <h2 class="font-bold mb-2">Editar Proveedor</h2>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                    <div wire:loading.class="opacity-50 pointer-events-none">
                        <x-form wire:submit="updateProveedor">
                            <x-input label="Nombre" wire:model="nombre" />
                            <x-input label="Telefono" wire:model="telefono" />
                            <x-input label="Email" wire:model="email" />
                            <x-textarea label="Direccion" wire:model="direccion" hint="Max 1000 caracteres" rows="5" />
                            @error('nombre')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror

                            <div class="mt-2 flex gap-2">
                                <!--button  class="btn btn-success" spinner>Actualizar</button-->
                                <x-button label="Guardar" type="submit" class="btn bg-green-700"
                                    spinner="updateProveedor" />
                                <x-button label="Cancelar" wire:click="cancelar" class="btn btn-warning"
                                    spinner="cancelar" />
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Actualizado {{ $actualizado->diffForHumans() }}</p>
                            <p class="mt-2 text-sm text-gray-500">El
                                {{ $actualizado->translatedFormat('l d \d\e F \d\e Y h:i a') }}
                            </p>
                        </x-form>
                    </div>
                </fieldset>
            </div>

        @endif
    </div>


</div>