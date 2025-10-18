<div>


    @if(!$editMode)
        <p class="mb-2 text-sm text-gray-500">
            Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
        </p>

        <div class="overflow-x-auto">
            {{-- 🔍 Cuadro de búsqueda --}}
            <div class="flex justify-between items-center">
                <x-input class="input" placeholder="Buscar repuesto..." icon="s-magnifying-glass"
                    wire:model.live.debounce.300ms="search" clearable />

                <h2 class="text-xl font-semibold">Listado de Repuestos</h2>
            </div>
            <!-- Tabla -->

            <table class="table table-xs">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>Precios</th>
                        <th>Marca</th>
                        <th>URL</th>
                        <th>Vehículos Compatibles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($repuestos as $repuesto)
                        <tr class="hover:bg-base-300">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle h-12 w-12">
                                            <a href="#" wire:click.prevent="editarProducto({{ $repuesto->id }})"><img
                                                    src='{{ asset("storage/$repuesto->thumb") }}' />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">
                                            <a href="" class="hover:underline">{{ $repuesto->nombre }}</a>
                                        </div>
                                        <div class="text-sm opacity-50">
                                            <a href="" class="hover:underline">{{ $repuesto->codigo }}</a>
                                            <div class="badge badge-sm badge-success">{{ $repuesto->stock }} unidades</div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <p>Compra: C$ {{ number_format($repuesto->precio_compra) }}</p>
                                <span class="badge badge-ghost badge-sm">Venta:
                                    C${{ number_format($repuesto->precio_venta) }}</span>
                            </td>
                            <td>{{ $repuesto->marca }}</td>
                            <td>{{ $repuesto->url }}</td>
                            <td>Toyota Yaris 2008</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- 🔽 Enlaces de paginación --}}
            <div class="mt-4">
                {{ $repuestos->links() }}
            </div>
        </div>


    @else
        <!-- Formulario de edición -->
        <x-button label="Regresar" class="btn btn-sm" icon="s-arrow-left" link="{{route('repuestos.show')}}" />
        

    @endif
</div>