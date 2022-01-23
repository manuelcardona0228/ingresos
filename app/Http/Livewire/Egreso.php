<?php

namespace App\Http\Livewire;

use App\Models\Total;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Egreso as ModelsEgreso;

class Egreso extends Component
{

    use WithPagination;

    public $contrato_id;
    public $concepto = '';
    public $valor = '';
    public $toLoad = false;
    public $search = '';

    public function render()
    {
        if($this->toLoad === true){
            $egresos = ModelsEgreso::when($this->contrato_id, function($q) {
                $q->where('contrato_id', $this->contrato_id)
                ->where('concepto', 'like', '%'.$this->search.'%');
            })->paginate(10);
            $total = Total::select('valor')->where('contrato_id', $this->contrato_id)->first();
        }else{
            $egresos = [];
            $total = 0;
        }

        return view('livewire.egreso', compact('egresos', 'total'));
    }

    public function resetFields(){
        $this->concepto = '';
        $this->valor = '';
    }

    public function loadEgresos(){
        $this->toLoad = true;
    }

    public function store() {
        $valor_nuevo = str_replace('.', '', $this->valor);
        $egreso = ModelsEgreso::create([
            'concepto' => $this->concepto,
            'valor' => intval($valor_nuevo),
            'contrato_id' => $this->contrato_id
        ]);

        $total = Total::where('contrato_id', $this->contrato_id)->first();
        $total->valor -= $egreso->valor;
        $total->update();

        // Set Flash Message
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"!El egreso se asigno correctamente al contrato.!"
        ]);

        $this->resetFields();
    }
}
