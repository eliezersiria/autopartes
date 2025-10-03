<?php

namespace App\Livewire\Categoria;

use Livewire\Component;
use App\Models\Categoria;

class GuardarCategoria extends Component
{
    public $nombre;
    // Reglas de validación
    protected $rules = ['nombre' => 'required|string|max:255|unique:categorias,nombre'];
    protected $messages = ['nombre.unique' => 'Este nombre de marca ya se encuentra registrado',];


    public function save()
    {
        $this->validate();
        // Guardar en la base de datos
        Categoria::create(['nombre' => $this->nombre]);
        // Limpiar el campo
        $this->nombre = '';
        // Mensaje de éxito
        session()->flash('message', 'Categoría guardada correctamente!');
    }

    public function render()
    {
        return view('livewire.categoria.guardar-categoria');
    }
}
