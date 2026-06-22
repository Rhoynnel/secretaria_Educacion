<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'docente.cargos';

    protected $fillable = [
        'codigo',
        'nombre',
        'categoria_id',
        'tipo_nomina_id',

    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function tipoNomina()
    {
        return $this->belongsTo(TipoNomina::class);
    }
}
