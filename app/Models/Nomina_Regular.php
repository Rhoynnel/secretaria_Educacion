<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomina_Regular extends Model
{
    protected $table = 'nomina.nomina__regulars';

    protected $fillable = [
        'id_nomina',
        'id_docente',
        'id_concepto',
        'id_categoria',
        'id_nivel',
        'monto',
    ];

    public function nomina()
    {
        return $this->belongsTo(Nomina::class, 'id_nomina');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    public function concepto()
    {
        return $this->belongsTo(Concepto::class, 'id_concepto');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'id_nivel');
    }
}
