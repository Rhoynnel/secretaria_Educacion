<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docente.docentes';

    protected $fillable = [
        'id_persona',
        'id_cargo',
        'id_dependencia',
        'fecha_ingreso',
        'id_banco',
        'cuenta_bancaria',
        'fecha_nomina',
        'id_tipo_nomina',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'id_dependencia');
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'id_banco');
    }

    public function tipoNomina()
    {
        return $this->belongsTo(TipoNomina::class, 'id_tipo_nomina');
    }

    
}
