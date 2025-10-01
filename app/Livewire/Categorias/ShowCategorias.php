<?php

namespace App\Livewire\Categorias;

use Livewire\Component;
use App\Models\Categorias;
use Livewire\WithPagination;

class ShowCategorias extends Component
{
    use WithPagination;

    // Propiedades públicas reactivas
    public $inicio;
    public $fin;
    public $numeroFilas;
    public $tiempo;
    public $headers = [
        ['key' => 'id', 'label' => 'ID'],
        ['key' => 'nombre', 'label' => 'Nombre de Categoria'],
        ['key' => 'actions', 'label' => 'Acciones'],
    ];

    public function mount()
    {
        // Inicializar propiedades si es necesario
    }

    public function editar($id)
    {
        //return redirect()->route('categorias.edit', $id);
    }

    public function delete($id)
    {
        $categoria = Categorias::withTrashed()->find($id);

        if ($categoria) {
            $categoria->delete();
            $this->resetPage();
            session()->flash('success', 'Categoría eliminada correctamente.');
        } else {
            session()->flash('error', "No se encontró la categoría con ID {{$id}}");
        }
    }

    public function render()
    {
        $inicio = microtime(true);
        $this->categorias = Categorias::paginate(10);
        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->categorias->total();

        return view('livewire.categorias.show-categorias', [
            'headers' => $this->headers,
            'categorias' => $this->categorias,
        ]);
    }
}