<?php

namespace App\Filament\Resources\Credencials\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CredencialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('periodo_id')
                    ->numeric(),
                TextEntry::make('persona_id')
                    ->numeric(),
                TextEntry::make('tipo_movimiento_id')
                    ->numeric(),
                TextEntry::make('dependencia_id')
                    ->numeric(),
                TextEntry::make('cargo_id')
                    ->numeric(),
                TextEntry::make('motivo_sustitucion_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('sustituto_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('ner_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('observacion')
                    ->placeholder('-'),
                TextEntry::make('observacion_sustitucion')
                    ->placeholder('-'),
                TextEntry::make('fecha_movimiento')
                    ->date(),
                TextEntry::make('fecha_efecto')
                    ->date(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
