<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingreso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ingreso';

    protected $fillable = [
        'concepto', 'valor', 'contrato_id'
    ];
}
