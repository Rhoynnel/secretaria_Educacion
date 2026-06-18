<?php

namespace App\Filament\Resources\TipoNominas;

use App\Filament\Resources\TipoNominas\Pages\ManageTipoNominas;
use App\Models\TipoNomina;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TipoNominaResource extends Resource
{
    protected static ?string $model = TipoNomina::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'TipoNomina';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo')
                    ->required()
                    ->numeric(),
                TextInput::make('nombre')
                    ->required(),
                Toggle::make('status')
                    ->required(),
                TextInput::make('abreviatura')
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('codigo')
                    ->numeric(),
                TextEntry::make('nombre'),
                IconEntry::make('status')
                    ->boolean(),
                TextEntry::make('abreviatura'),
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
            ->recordTitleAttribute('TipoNomina')
            ->columns([
                TextColumn::make('codigo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nombre')
                    ->searchable(),
                IconColumn::make('status')
                    ->boolean(),
                TextColumn::make('abreviatura')
                    ->searchable(),
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
            'index' => ManageTipoNominas::route('/'),
        ];
    }
}
