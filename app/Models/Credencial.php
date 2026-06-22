<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credencial extends Model
{
    protected $table = 'credencial.credenciales';

    protected $fillable = [
        'periodo_id',
        'persona_id',
        'tipo_movimiento_id',
        'dependencia_id',
        'cargo_id',
        'sustituto_id',
        'ner_id',
        'observacion',
        'observacion_sustitucion',
        'fecha_movimiento',
        'fecha_efecto',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function ner()
    {
        return $this->belongsTo(Ner::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function tipoMovimiento()
    {
        return $this->belongsTo(TipoMovimiento::class);
    }
}
