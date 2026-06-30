<?php

namespace App\Filament\Resources\Credencials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CredencialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('periodo_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('persona_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tipo_movimiento_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('dependencia_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cargo_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('motivo_sustitucion_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sustituto_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('ner_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('observacion')
                    ->searchable(),
                TextColumn::make('observacion_sustitucion')
                    ->searchable(),
                TextColumn::make('fecha_movimiento')
                    ->date()
                    ->sortable(),
                TextColumn::make('fecha_efecto')
                    ->date()
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
