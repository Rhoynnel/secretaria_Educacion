<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personal.personas';

    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'nacionalidad',
        'genero',
        'direccion',
        'telefono',
        'email',
    ];
}
