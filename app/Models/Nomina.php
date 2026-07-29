<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table = 'nomina.nominas';

    protected $fillable = [
        'nombre',
        'fecha_nomina',
        'id_tipo_nomina',
        'estatus',
    ];

    public function tipoNomina()
    {
        return $this->belongsTo(TipoNomina::class, 'id_tipo_nomina');
    }

    
}
