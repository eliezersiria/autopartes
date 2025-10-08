<?php

namespace App\Livewire\Proveedor;
use Mary\Traits\Toast;
use App\Models\Proveedor;
use Livewire\Component;

class AgregarProveedor extends Component
{
    use Toast;
    public $nombre;
    public $telefono;
    public $email;
    public $direccion;
    protected $rules = [
        'nombre' => 'required|string|unique:proveedors,nombre',
        'telefono' => 'required|digits_between:8,15|numeric|unique:proveedors,telefono',
        'email' => 'required|email|unique:proveedors,email',
        'direccion' => 'required|string'
    ];

    public function saveProveedor()
    {
        $this->validate();
        // Guardar en la base de datos
        Proveedor::create([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'direccion' => $this->direccion,
        ]);
        $this->reset(['nombre','telefono', 'email', 'direccion']);
        session()->flash('message', 'Proveedor guardado correctamente!');
        $this->success('Proveedor guardado correctamente!');
    }
    public function render()
    {
        return view('livewire.proveedor.agregar-proveedor');
    }
}
