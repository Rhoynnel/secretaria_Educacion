<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table = 'docente.dependencias';

    protected $fillable = [
        'codigo',
        'nombre',
        'rural',
        'marginal',
        'direccion',
        'municipio_id',
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function ners()
    {
        return $this->hasMany(Ner::class);
    }
}
