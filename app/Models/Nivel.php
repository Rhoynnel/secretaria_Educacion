<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'nomina.nivels';

    protected $fillable = [
        'nivel',
        'monto',
    ];

    public function nominaMovimientos()
    {
        return $this->hasMany(Nomina_Movimiento::class, 'id_nivel');
    }

    public function nominaRegulars()
    {
        return $this->hasMany(Nomina_Regular::class, 'id_nivel');
    }
}
