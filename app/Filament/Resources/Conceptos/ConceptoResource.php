<?php

namespace App\Filament\Resources\Conceptos;

use App\Filament\Resources\Conceptos\Pages\ManageConceptos;
use App\Models\Concepto;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ConceptoResource extends Resource
{
    protected static ?string $model = Concepto::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Concepto';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo')
                    ->required(),
                TextInput::make('nombre')
                    ->required(),
                Select::make('id_tipo_concepto')
                    ->required()
                    ->options([
                        1 => 'FRECUENTE',
                        2 => 'ESPORADICO',
                    ]),
                Select::make('id_partida')
                    ->options(function () {
                        return \App\Models\Partida::pluck('numero', 'id');
                    }),
                    
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('codigo'),
                TextEntry::make('nombre'),
                TextEntry::make('tipo_concepto')
                    ->label('Tipo de Concepto')
                    ->formatStateUsing(fn (int $state): string => match ($state) {
                        1 => 'FRECUENTE',
                        2 => 'ESPORADICO',
                        default => 'DESCONOCIDO',
                    }),
                TextEntry::make('partida.numero')
                    ->label('Número de Partida'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Concepto')
            ->columns([
                TextColumn::make('codigo')
                    ->searchable(),
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('tipo_concepto')
                    ->label('Tipo de Concepto')
                    ->sortable()
                    ->formatStateUsing(fn (int $state): string => match ($state) {
                                1 => 'FRECUENTE',
                                2 => 'ESPORADICO',
                                default => 'DESCONOCIDO',
                            }),
                TextColumn::make('partida.numero')
                    ->label('Número de Partida')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageConceptos::route('/'),
        ];
    }
}
