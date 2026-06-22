<?php

namespace App\Filament\Resources\Cargos;

use App\Filament\Resources\Cargos\Pages\ManageCargos;
use App\Models\Cargo;
use App\Models\Categoria;
use App\Models\TipoNomina;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\select;

class CargoResource extends Resource
{
    protected static ?string $model = Cargo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Cargo';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo')
                    ->required(),
                TextInput::make('nombre')
                    ->required(),
                Select::make('categoria_id')
                    ->required()
                    ->options(Categoria::pluck('nombre', 'id')),
                Select::make('tipo_nomina_id')
                    ->required()
                    ->options(TipoNomina::where('status', true)->pluck('nombre', 'id')),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('codigo'),
                TextEntry::make('nombre'),
                TextEntry::make('categoria.nombre')
                    ->label('Categoria'),
                TextEntry::make('TipoNomina.nombre')
                    ->label('Tipo de Nómina'),
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
            ->recordTitleAttribute('Cargo')
            ->columns([
                TextColumn::make('codigo')
                    ->searchable(),
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('Categoria.nombre')
                    ->label('Categoria')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('TipoNomina.nombre')
                    ->label('Tipo de Nómina')
                    ->searchable()
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
            'index' => ManageCargos::route('/'),
        ];
    }
}
