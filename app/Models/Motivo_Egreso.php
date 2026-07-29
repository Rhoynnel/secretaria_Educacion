<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivo_Egreso extends Model
{
    protected $table = 'nomina.motivo_egresos';

    protected $fillable = [
        'descripcion',
    ];

    public function nominaEgresos()
    {
        return $this->hasMany(Nomina_Egreso::class, 'motivo_egreso');
    }
}
