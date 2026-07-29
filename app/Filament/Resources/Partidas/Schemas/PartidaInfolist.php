<?php

namespace App\Filament\Resources\Partidas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PartidaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('numero'),
                TextEntry::make('nombre'),
                TextEntry::make('tipoNomina.nombre')
                    ->label('Tipo de Nómina'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
