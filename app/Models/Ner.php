<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ner extends Model
{
    protected $table = 'docente.ners';

    protected $fillable = [
        'dependencia_id',
        'codigo',
        'nombre',
        'parroquia_id',
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
}
