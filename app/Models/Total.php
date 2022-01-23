<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Total extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'total';

    protected $fillable = [
        'valor', 'contrato_id'
    ];

    public function contrato(){
        return $this->belongsTo(Contrato::class);
    }
}
