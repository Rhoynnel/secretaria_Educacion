<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoNomina extends Model
{
    protected $table = 'nomina.tipo_nominas';

    protected $fillable = [
        'codigo',
        'nombre',
        'status',
        'abreviatura',
    ];

    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }
}
