<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contrato';

    protected $fillable = [
        'nombre', 'descripcion', 'estado', 'creado_por'
    ];

    public function total(){
        return $this->hasOne(Total::class);
    }
}
