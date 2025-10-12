<?php

namespace App\Livewire\Repuesto;
use Mary\Traits\Toast;
use App\Models\Repuesto;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Vehiculo;
use App\Models\RepuestoVehiculo;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AgregarRepuesto extends Component
{
    use Toast;
    use WithFileUploads;
    public $categorias = [];
    public $proveedores = [];
    public $vehiculos = [];
    public $codigo;
    public $nombre;
    public $marca;
    public $descripcion;
    public $precio_compra;
    public $precio_venta;
    public $stock;
    public $url;
    public $thumb;
    public $categoria_id;
    public $proveedor_id;
    public $vehiculo_id;
    public $repuesto_id;

    public function updatedPrecioCompra($value)
    {
        $this->precio_venta = is_numeric($value) ? $value * 1.4 : null;
    }
    public function updatedNombre($value)
    {
        // Genera el slug automáticamente cada vez que se cambia el nombre
        $this->url = Str::slug($value);
         // Opcional: asegurar que sea único
        $contador = 1;
        $slugOriginal = $this->url;
        while (Repuesto::where('url', $this->url)->exists()) {
            $this->url = $slugOriginal . '-' . $contador++;
        }

    }
    public function mount()
    {
        $this->categorias = Categoria::all()->map(fn($categoria) => [
            'name' => $categoria->nombre,
            'id' => $categoria->id,
        ])->toArray();

        $this->proveedores = Proveedor::all()->map(fn($proveedor) => [
            'name' => $proveedor->nombre,
            'id' => $proveedor->id,
        ])->toArray();

        $this->vehiculos = Vehiculo::orderBy('marca')->get()->map(fn($vehiculo) => [
            'name' => "$vehiculo->marca $vehiculo->modelo $vehiculo->anio",
            'id' => $vehiculo->id,
        ])->toArray();

    }

    protected $rules = [
        'codigo' => 'required|string',
        'nombre' => 'required|string',
        'marca' => 'required|string',
        'descripcion' => 'required',
        'precio_compra' => 'required|numeric',
        'precio_venta' => 'required|numeric',
        'stock' => 'required|string',
        'url' => 'required|string|unique:repuestos,url',
        'thumb' => 'required|image|max:2048', // máximo 2MB
        'categoria_id' => 'required',
        'proveedor_id' => 'required',
        'vehiculo_id' => 'required'
    ];

    public function saveRepuesto()
    {

        $this->validate();

        // Guardar imagen si se subió
        $path = $this->thumb?->store('images', 'public');

        $repuesto = Repuesto::create([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'marca' => $this->marca,
            'descripcion' => $this->descripcion,
            'precio_compra' => $this->precio_compra,
            'precio_venta' => $this->precio_venta,
            'stock' => $this->stock,
            'url' => $this->url,
            'thumb' => $path,
            'categoria_id' => $this->categoria_id,
            'proveedor_id' => $this->proveedor_id,
        ]);

        //Obtengo el ID recién insertado
        $this->repuesto_id = $repuesto->id;
        //Lo inserto en la tabla Pivot repuesto_vehiculos
        RepuestoVehiculo::create([
            'repuesto_id' => $this->repuesto_id,
            'vehiculo_id' => $this->vehiculo_id,
        ]);


        $this->reset('thumb');
        //$this->reset();
        session()->flash('message', "Repuesto guardado correctamente!");
        $this->success('Repuesto guardado correctamente');
    }

    public function render()
    {
        return view('livewire.repuesto.agregar-repuesto');
    }
}
