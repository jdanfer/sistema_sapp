<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class CrearRegistro extends Component
{
    public $open = true;
    public $descrip, $cantidad, $image, $identificador;
    protected $rules = [
        'descrip' => 'required',
        'cantidad' => 'required',
        'image' => 'required|image',
    ];

    public function mount()
    {
        $this->identificador = rand();
    }
    public function save()
    {
        $this->validate();
        $image = $this->image->store('fotos');

        User::create([
            'descrip' => $this->descrip,
            'cantidad' => $this->cantidad,
            'image' => $image
        ]);
        $this->reset(['open', 'descrip', 'cantidad', 'image']);
        $this->identificador = rand();

        $this->emitTo('show-herramientas', 'render');
        $this->emit('alert', 'Registro creado correctamente');
    }

    public function render()
    {
        return view('livewire.crear-registro');
    }
}
