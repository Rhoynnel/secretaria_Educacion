<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'nomina.conceptos';

    protected $fillable = [
        'codigo',
        'nombre',
        'id_tipo_concepto',
        'id_partida',
    ];

    public function partida()
    {
        return $this->belongsTo(Partida::class, 'id_partida');
    }
    
}
