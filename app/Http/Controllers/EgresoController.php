<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EgresoController extends Controller
{
    public function egresoContratoIndex($id) {
        $contrato_id = $id;

        return view('egresos.principal', compact('contrato_id'));
    }
}
