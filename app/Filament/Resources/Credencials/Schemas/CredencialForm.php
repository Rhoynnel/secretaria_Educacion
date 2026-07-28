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
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Forms\Get;
use Filament\Forms\Components\Set;
use Filament\Notifications\Notification;




class CredencialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Wizard::make([
                    Wizard\Step::make('Datos Personales')
                        ->description('Aqui se Describen los datos Personales de los Docentes')
                        ->columns(2)
                        ->schema([
                            // ...
                            TextInput::make('periodo')
                                ->label('Periodo')
                                ->disabled()
                                ->default(fn() => Periodo::where('status', true)->first()?->periodo), // Selecciona el activo por defecto
                            Hidden::make('periodo_id')
                                ->required()
                                ->dehydrated()
                                ->default(fn() => Periodo::where('status', true)->first()?->id), // Selecciona el activo por defecto

                            TextInput::make('cedula')
    ->label('Cédula')
    ->required()
    // En Filament (v3/v4/v5) esta es la sintaxis correcta para reaccionar al salir del input:
    ->live(onBlur: true) 
    ->afterStateUpdated(function (string|null $state, Set $set) {
        // Si limpian el input, reseteamos el estado
        if (blank($state)) {
            $set('nombres', null);
            $set('apellidos', null);
            $set('persona_id', null);
            return;
        }

        // Consultamos la base de datos
        $persona = Persona::where('cedula', $state)->first();

        if ($persona) {
            // Mutamos el estado del Schema dinámicamente
            $set('nombres', $persona->nombres);
            $set('apellidos', $persona->apellidos);
            $set('persona_id', $persona->id);
        } else {
            // Limpiamos si no existe el registro
            $set('nombres', null);
            $set('apellidos', null);
            $set('persona_id', null);
            
            // Notificación nativa de sistema
            Notification::make()
                ->title('Persona no encontrada')
                ->warning()
                ->send();
        }
                }),

    TextInput::make('nombres')
        ->label('Nombres')
        ->disabled() // Bloqueado para el usuario
        ->dehydrated(false), // v5: Evita enviar datos no modificables al servidor

    TextInput::make('apellidos')
        ->label('Apellidos')
        ->disabled()
        ->dehydrated(false),

    // Hidden retiene el ID de forma segura en el ciclo de Livewire v4 sin renderizar HTML
    Hidden::make('persona_id')
        ->required(),
                        ]),
                    Wizard\Step::make('Datos de Movimiento')
                        ->description('Aqui se Describen los datos de movimiento del Docente')
                        ->columns(2)
                        ->schema([
                            // ...
                            Select::make('tipo_movimiento_id')
                                ->required()
                                ->options(TipoMovimiento::pluck('nombre', 'id')),
                            Select::make('dependencia_id')
                                ->searchable()
                                ->required()
                                ->options(Dependencia::pluck('nombre','id')),
                            Select::make('ner_id')
                                ->options(Ner::pluck('nombre','id')),
                            Select::make('cargo_id')
                                ->searchable()
                                ->required()
                                ->options(Cargo::pluck('nombre','id')),

                        ]),
                    Wizard\Step::make('Datos de sustitucion si existe')
                        ->description('Aqui se Describen los datos de sustitucion del Docente')
                        ->columns(2)
                        ->schema([
                            // ...
                            TextInput::make('motivo_sustitucion_id')
                                ->numeric(),
                            TextInput::make('sustituto_id')
                                ->numeric(),
                            TextInput::make('observacion_sustitucion'),


                        ]),
                    Wizard\Step::make('Otros Datos')
                        ->columns(2)
                        ->schema([
                            // ...
                            TextInput::make('observacion'),

                            DatePicker::make('fecha_movimiento')
                                ->required(),
                            DatePicker::make('fecha_efecto')
                                ->required(),

                        ]),

                ])->columnSpanFull()
                
            ]);
    }
}
