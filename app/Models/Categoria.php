<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'nomina.categorias';

    protected $fillable = [
        'nombre',
        'porcentaje',
    ];
}
