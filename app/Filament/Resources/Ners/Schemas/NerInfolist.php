<?php

namespace App\Filament\Resources\Ners\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('dependencia_codigo'),
                TextEntry::make('codigo'),
                TextEntry::make('nombre'),
                TextEntry::make('parroquia_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
