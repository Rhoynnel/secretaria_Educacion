<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    protected $table = 'comun.parroquias';

    protected $fillable = [
        'nombre',
        'municipio_id',
    ];

    public function ners()
    {
        return $this->hasMany(Ner::class);
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}
