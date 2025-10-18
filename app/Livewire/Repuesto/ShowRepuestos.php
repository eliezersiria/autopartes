<?php

namespace App\Livewire\Repuesto;

use Livewire\Component;
use App\Models\Repuesto;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class ShowRepuestos extends Component
{
    use WithPagination;
    use Toast;

    public $inicio;
    public $fin;
    public $numeroFilas;
    public $tiempo;
    // Campo de búsqueda
    public $search = ''; // Cada vez que cambie el texto de búsqueda, reinicia a la página 1
    public $editMode = false;
    public $repuesto_id;
    public $codigo;
    public $nombre;
    public $marca;
    public $descripcion;
    public $precio_compra;
    public $precio_venta;
    public $precio_promo;
    public $stock;
    public $url;
    public $activo;
    public $thumb;
    public $categoria_id;
    public $proveedor_id;
    protected $rules = [
        'codigo' => 'required|string',
        'nombre' => 'required|string',
        'marca' => 'required|string',
        'descripcion' => 'required',
        'precio_compra' => 'required|numeric',
        'precio_venta' => 'required|numeric',
        'stock' => 'required|string',
        'url' => 'required|string|unique:repuestos,url',
        'thumb' => 'required|image|max:1024', // 1MB máximo
        'categoria_id' => 'required',
        'proveedor_id' => 'required',
        'vehiculo_id' => 'required'
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function editarProducto($id)
    {
        $repuesto = Repuesto::findOrFail($id);
        $this->repuesto_id = $repuesto->id;
        $this->codigo = $repuesto->codigo;
        $this->nombre = $repuesto->nombre;
        $this->marca = $repuesto->marca;
        $this->descripcion = $repuesto->descripcion;
        $this->precio_compra = $repuesto->precio_compra;
        $this->precio_venta = $repuesto->precio_venta;
        $this->precio_promo = $repuesto->precio_promo;
        $this->stock = $repuesto->stock;
        $this->url = $repuesto->url;
        $this->activo = $repuesto->activo;
        $this->thumb = $repuesto->thumb;
        $this->categoria_id = $repuesto->categoria_id;
        $this->proveedor_id = $repuesto->proveedor_id;
        $this->editMode = true; // Muestra el formulario en lugar de la tabla
    }

    public function updateRepuesto()
    {
        $this->validate();

    }
    public function render()
    {
        $inicio = microtime(true);

        $this->repuestos = Repuesto::query()->when($this->search, function ($query) {
            $query->where('nombre', 'like', "%$this->search%");
        })->paginate(10);

        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->repuestos->total();

        return view('livewire.repuesto.show-repuestos', [
            'repuestos' => $this->repuestos,
        ]);
    }
}
