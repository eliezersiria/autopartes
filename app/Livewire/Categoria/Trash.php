<?php

namespace App\Livewire\Categoria;
use Livewire\Component;
use App\Models\Categoria;
use Mary\Traits\Toast;


class Trash extends Component
{
    use Toast;
    public $categorias;
    public $numeroFilas;
    public $tiempo;
    public $showModalForceDelete = false;
    public $idSeleccionado;//Id del modal force delete
    public $catNombre;

    public function abrirModalForceDelete($id, $nombre)
    {
        $this->idSeleccionado = $id;
        $this->catNombre = $nombre;
        $this->showModalForceDelete = true;
    }

    public function restore($id)
    {
        Categoria::withTrashed()->find($id)->restore(); // Restaura el registro
        // Toast
        $this->success('El registro fue restaurado');
        session()->flash('success', 'Registro Restaurado.');
    }
    public function forceDelete($id)
    {
        Categoria::withTrashed()->find($id)->forceDelete(); // Elimina permanentemente
        $this->showModalForceDelete = false;
        $this->warning('El registro fue eliminado permanentemente');        
        session()->flash('success', 'El Registro fue eliminado permanentemente.');
    }
    public function render()
    {
        $inicio = microtime(true);
        $this->categorias = Categoria::onlyTrashed()->get();
        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->categorias->count();
        return view('livewire.categoria.trash', [
            'categorias' => $this->categorias
        ]);
    }
}
