<?php

namespace App\Livewire\Proveedor;

use Livewire\Component;
use app\Models\Proveedor;
use Mary\Traits\Toast;

class ShowProveedores extends Component
{
    //Campos de la tabla
    use Toast;
    public $proveedor_id;
    public $nombre;
    public $telefono;
    public $email;
    public $direccion;
    public $actualizado;
    public $proveedores;
    public $numeroFilas;
    public $tiempo;
    public $editMode = false;
    public $showModalSendTrash = false;
    public function mount()
    {
        $this->proveedores = Proveedor::all();
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $this->proveedor_id = $proveedor->id;
        $this->nombre = $proveedor->nombre;
        $this->telefono = $proveedor->telefono;
        $this->email = $proveedor->email;
        $this->direccion = $proveedor->direccion;
        $this->actualizado = $proveedor->updated_at;
        $this->editMode = true; // Muestra el formulario en lugar de la tabla
    }

    public function updateProveedor()
    {
        $this->validate([
            'nombre' => 'required|string',
            'telefono' => 'required|digits_between:8,15|numeric',
            //'email' => 'required|email|unique:proveedors,email',
            'direccion' => 'required|string'
        ]);

        $proveedor = Proveedor::findOrFail($this->proveedor_id);
        $proveedor->update([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            //'email' => $this->email,
            'direccion' => $this->direccion
        ]);

        // resetear estado
        //$this->reset(['proveedor_id', 'nombre','telefono','email','direccion']);
        $this->proveedores = Proveedor::all();
        //$this->editMode = false; // volver a la tabla
        $this->success('El registro fue actualizado');
        session()->flash('success', 'El registro fue actualizado');
    }
    public function cancelar()
    {
        $this->reset(['proveedor_id', 'nombre', 'telefono', 'email', 'direccion']);
        $this->editMode = false;
    }

    public function sendTrash($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $this->proveedor_id = $proveedor->id;
        $this->nombre = $proveedor->nombre;
        $this->showModalSendTrash = true;
    }

    public function closeModalSendTrash()
    {
        $this->showModalSendTrash = false;
    }
    public function delete()
    {
        $proveedor = Proveedor::find($this->proveedor_id);

        if ($proveedor) {
            $proveedor->delete();
            $this->reset();
            session()->flash('success', 'El registro fue enviado a la papelera.');
            $this->showModalSendTrash = false;
            // Toast
            $this->success('El registro fue enviado a la papelera');

        } else {
            session()->flash('error', "No se encontró la categoría con ID {{$this->categoria_id}}");
            $this->showModalSendTrash = false;
        }
    }
    public function render()
    {
        $inicio = microtime(true);
        $this->proveedores = Proveedor::all();
        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->proveedores->count();
        return view('livewire.proveedor.show-proveedores');
    }
}
