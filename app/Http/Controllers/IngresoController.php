<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function ingresoContratoIndex($id) {
        $contrato_id = $id;

        return view('ingresos.principal', compact('contrato_id'));
    }
}
