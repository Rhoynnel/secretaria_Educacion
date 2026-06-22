<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'nomina.categorias';

    protected $fillable = [
        'codigo',
        'nombre',
        'sueldo',
    ];

    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }
}
