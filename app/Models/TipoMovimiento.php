<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    protected $table = 'credencial.tipo_movimientos';

    protected $fillable = [
        'nombre',
        'tipo',
    ];
}
