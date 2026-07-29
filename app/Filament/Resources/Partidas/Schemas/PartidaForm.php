<?php

namespace App\Filament\Resources\Partidas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PartidaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('numero')
                    ->required(),
                TextInput::make('nombre')
                    ->required(),
                Select::make('id_tipo_nomina')
                    ->required()
                    ->searchable()
                    ->options(function () {
                        return \App\Models\TipoNomina::pluck('nombre', 'id');
                    }),
            ]);
    }
}
