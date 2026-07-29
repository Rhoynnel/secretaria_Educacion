<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomina_Egreso extends Model
{
    protected $table = 'nomina.nomina__egresos';

    protected $fillable = [
        'id_nomina',
        'id_docente',
        'fecha_egreso',
        'motivo_egreso',
    ];

    public function nomina()
    {
        return $this->belongsTo(Nomina::class, 'id_nomina');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    public function motivoEgreso()
    {
        return $this->belongsTo(Motivo_Egreso::class, 'motivo_egreso');
    }

    

}
