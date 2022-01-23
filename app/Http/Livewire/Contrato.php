<?php

namespace App\Http\Livewire;

use App\Models\Total;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Contrato as ModelsContrato;

class Contrato extends Component
{
    use WithPagination;

    public $view = 'create';
    public $contrato_id;
    public $nombre = '';
    public $descripcion = '';
    public $toLoad = false;
    public $search = '';

    public function render()
    {
        if($this->toLoad === true){
            $contratos = ModelsContrato::where('creado_por', Auth::user()->id)
                                ->where('nombre', 'like', '%'.$this->search.'%')
                                ->with('total')
                                ->paginate(10);
        }else{
            $contratos = [];
        }

        return view('livewire.contrato', compact('contratos'));
    }

    public function resetFields(){
        $this->nombre = '';
        $this->descripcion = '';
    }

    public function store(){

        $this->validate(['nombre' => 'required', 'descripcion' => 'required']);

        $contrato = ModelsContrato::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'creado_por' => Auth::user()->id
        ]);

        $total = Total::create([
            'valor' => 0,
            'contrato_id' => $contrato->id
        ]);

        // Set Flash Message
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"!El contrato se creo con exito!"
        ]);

        $this->resetFields();
    }

    public function edit($id) {
        $contrato = ModelsContrato::find($id);

        $this->contrato_id = $contrato->id;
        $this->nombre = $contrato->nombre;
        $this->descripcion = $contrato->descripcion;

        $this->view = 'edit';
    }

    public function update() {

        $this->validate(['nombre' => 'required', 'descripcion' => 'required']);

        $contrato = ModelsContrato::find($this->contrato_id);

        $contrato->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        // Set Flash Message
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"!El contrato se actualizo con exito!"
        ]);

        $this->default();

    }

    public function default() {
        $this->nombre = '';
        $this->descripcion = '';

        $this->view = 'create';
    }

    public function loadContratos() {
        $this->toLoad = true;
    }
}
