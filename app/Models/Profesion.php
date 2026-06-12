<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = 'nomina.profesions';

    protected $fillable = [
        'nombre',
        'porcentaje',
    ];
}
