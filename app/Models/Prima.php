<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prima extends Model
{
    protected $table = 'nomina.primas';

    protected $fillable = [
        'nombre',
        'porcentaje',
        'monto_fijo',
    ];
}
