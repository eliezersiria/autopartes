<?php

namespace App\Livewire\Proveedor;
use Mary\Traits\Toast;

use Livewire\Component;
use App\Models\Proveedor;

class TrashProveedor extends Component
{
    use Toast;
    public $numeroFilas;
    public $tiempo;
    public $proveedores;
    public $showModalForceDelete = false;
    public $proveedor_id;//Id del modal force delete
    public $provNombre;

    public function abrirModalForceDelete($id, $nombre)
    {
        $this->proveedor_id = $id;
        $this->provNombre = $nombre;
        $this->showModalForceDelete = true;
    }

    public function forceDelete($id)
    {
        Proveedor::withTrashed()->find($id)->forceDelete(); // Elimina permanentemente
        $this->showModalForceDelete = false;
        $this->warning('Registro eliminado permanentemente', position: 'toast-bottom toast-start');        
        session()->flash('success', 'El Registro fue eliminado permanentemente.');
    }

    public function restore($id)
    {
        Proveedor::withTrashed()->find($id)->restore(); // Restaura el registro
        // Toast
        $this->success('El registro fue restaurado');
        session()->flash('success', 'Registro Restaurado.');
    }

    public function render()
    {
        $inicio = microtime(true);
        $this->proveedores = Proveedor::onlyTrashed()->get();
        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->proveedores->count();
        return view('livewire.proveedor.trash-proveedor', [
            'proveedores' => $this->proveedores
        ]);
    }
}
