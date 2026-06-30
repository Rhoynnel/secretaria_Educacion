<?php

namespace App\Filament\Resources\Credencials\Schemas;

use App\Models\Cargo;
use App\Models\Dependencia;
use App\Models\MotivoSustitucion;
use App\Models\Ner;
use App\Models\Persona;
use App\Models\Periodo;
use App\Models\TipoMovimiento;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;


class CredencialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


                TextInput::make('periodo_id')
                    ->label('Periodo')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->default(fn () => Periodo::where('status', true)->first()?->periodo), // Selecciona el activo por defecto
                TextInput::make('persona_id')
                    ->label('Cedula Docente')
                    ->required()
                    ->numeric(),
                TextInput::make('persona.nombre')
                    ->label('Nombres'),
                TextInput::make('persona.apellidos')
                    ->label('Apellidos'),
                TextInput::make('tipo_movimiento_id')
                    ->required()
                    ->numeric(),
                TextInput::make('dependencia_id')
                    ->required()
                    ->numeric(),
                TextInput::make('cargo_id')
                    ->required()
                    ->numeric(),
                TextInput::make('motivo_sustitucion_id')
                    ->numeric(),
                TextInput::make('sustituto_id')
                    ->numeric(),
                TextInput::make('ner_id')
                    ->numeric(),
                TextInput::make('observacion'),
                TextInput::make('observacion_sustitucion'),
                DatePicker::make('fecha_movimiento')
                    ->required(),
                DatePicker::make('fecha_efecto')
                    ->required(),
            ]);
    }
}
