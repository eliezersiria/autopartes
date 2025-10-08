<?php

namespace App\Livewire\Categoria;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class ShowCategorias extends Component
{
    use WithPagination;
    use Toast;
    // Propiedades públicas reactivas
    public $inicio;
    public $fin;
    public $numeroFilas;
    public $tiempo;
    public $categoriaEdit; // Para almacenar los datos del registro a editar
    public $isOpen = false; // Controla la visibilidad del formulario/modal
    public $headers = [
        ['key' => 'id', 'label' => 'ID'],
        ['key' => 'nombre', 'label' => 'Nombre de Categoria'],
        ['key' => 'actions', 'label' => 'Acciones'],
    ];

    public $categoria_id;
    public $nombre;
    public $actualizado;
    // Cambia entre vista tabla y vista edición
    public $editMode = false;
    public $showModal = false;
    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function delete()
    {
        $categoria = Categoria::withTrashed()->find($this->categoria_id);

        if ($categoria) {
            $categoria->delete();
            $this->resetPage();
            session()->flash('success', 'El registro fue enviado a la papelera.');
            $this->showModal = false;
            // Toast
            $this->success('El registro fue enviado a la papelera');

        } else {
            session()->flash('error', "No se encontró la categoría con ID {{$this->categoria_id}}");
            $this->showModal = false;
        }
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->actualizado = $categoria->updated_at;
        $this->editMode = true; // Muestra el formulario en lugar de la tabla
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required|string|min:4'
        ]);

        $categoria = Categoria::findOrFail($this->categoria_id);
        $categoria->update([
            'nombre' => $this->nombre
        ]);

        // resetear estado
        $this->reset(['categoria_id', 'nombre']);
        $this->categorias = Categoria::all();
        $this->editMode = false; // volver a la tabla
        $this->success('El registro fue actualizado');
        session()->flash('success', 'El registro fue actualizado');
    }
    public function cancelar()
    {
        $this->reset(['categoria_id', 'nombre']);
        $this->editMode = false;
    }
    public function abrirModalEliminar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->showModal = true;
    }

    public function closeModalEliminar()
    {
        $this->showModal = false;
    }
    public function render()
    {
        $inicio = microtime(true);
        $this->categorias = Categoria::paginate(10);
        $fin = microtime(true);
        $this->tiempo = round($fin - $inicio, 3);
        $this->numeroFilas = $this->categorias->total();

        return view('livewire.categoria.show-categorias', [
            'headers' => $this->headers,
            'categorias' => $this->categorias,
        ]);
    }
}