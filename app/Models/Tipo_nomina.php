<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_nomina extends Model
{
    protected $table = 'nomina.tipo_nominas';

    protected $fillable = [
        'nombre',
        'status',
        'abreviatura',
    ];
}
