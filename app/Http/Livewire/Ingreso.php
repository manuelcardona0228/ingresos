<?php

namespace App\Http\Livewire;

use App\Models\Ingreso as ModelsIngreso;
use App\Models\Total;
use Livewire\Component;
use Livewire\WithPagination;

class Ingreso extends Component
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
            $ingresos = ModelsIngreso::when($this->contrato_id, function($q) {
                $q->where('contrato_id', $this->contrato_id)
                ->where('concepto', 'like', '%'.$this->search.'%');
            })->paginate(10);
            $total = Total::select('valor')->where('contrato_id', $this->contrato_id)->first();
        }else{
            $ingresos = [];
            $total = 0;
        }

        return view('livewire.ingreso', compact('ingresos', 'total'));
    }

    public function resetFields(){
        $this->concepto = '';
        $this->valor = '';
    }

    public function loadIngresos(){
        $this->toLoad = true;
    }

    public function store() {
        $valor_nuevo = str_replace('.', '', $this->valor);
        $ingreso = ModelsIngreso::create([
            'concepto' => $this->concepto,
            'valor' => intval($valor_nuevo),
            'contrato_id' => $this->contrato_id
        ]);

        $total = Total::where('contrato_id', $this->contrato_id)->first();
        $total->valor += $ingreso->valor;
        $total->update();

        // Set Flash Message
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"!El ingreso se asigno correctamente al contrato.!"
        ]);

        $this->resetFields();
    }
}
