<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antiguedad extends Model
{
    protected $table = 'nomina.antiguedads';

    protected $fillable = [
        'anos',
        'porcentaje',
    ];
}
