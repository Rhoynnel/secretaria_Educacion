<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $table = 'nomina.partidas';

    protected $fillable = [
        'numero',
        'nombre',
        'id_tipo_nomina',
    ];

    public function conceptos()
    {
        return $this->hasMany(Concepto::class, 'id_partida');
    }

    public function tipoNomina()
    {
        return $this->belongsTo(TipoNomina::class, 'id_tipo_nomina');
    }
}
