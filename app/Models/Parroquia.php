<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    protected $table = 'comun.parroquias';

    protected $fillable = [
        'nombre',
    ];

    public function ners()
    {
        return $this->hasMany(Ner::class);
    }
}
