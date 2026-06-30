<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoSustitucion extends Model
{
    protected $table = 'credencial.movimientos_sustitucion';

    protected $fillable = [
        'nombre',
    ];
}
