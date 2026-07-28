<?php

namespace App\Filament\Resources\Ners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('dependencia_codigo')
                    ->required(),
                TextInput::make('codigo')
                    ->required(),
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('parroquia_id')
                    ->numeric(),
            ]);
    }
}
