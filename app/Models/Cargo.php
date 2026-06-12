<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'nomina.cargos';

    protected $fillable = [
        'nombre',
        'porcentaje',
        'categoria_id',
        'tipo_nomina_id',
    ];
}
