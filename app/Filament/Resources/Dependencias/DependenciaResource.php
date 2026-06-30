<?php

namespace App\Filament\Resources\Dependencias;

use App\Filament\Resources\Dependencias\Pages\ManageDependencias;
use App\Models\Dependencia;
use App\Models\Municipio;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DependenciaResource extends Resource
{
    protected static ?string $model = Dependencia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup =  'Docentes';

    protected static ?string $recordTitleAttribute = 'Dependencia';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo')
                    ->required(),
                TextInput::make('nombre')
                    ->required(),
                Toggle::make('rural')
                    ->required(),
                Toggle::make('marginal')
                    ->required(),
                TextInput::make('direccion'),
                Select::make('municipio_id')
                    ->label('Municipio')
                    ->searchable()
                    ->required()
                    ->options(Municipio::pluck('nombre', 'id')),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('codigo'),
                TextEntry::make('nombre'),
                IconEntry::make('rural')
                    ->boolean(),
                IconEntry::make('marginal')
                    ->boolean(),
                TextEntry::make('direccion')
                    ->placeholder('-'),
                TextEntry::make('municipio_id')
                    ->label('Municipio')
                    ->numeric(),
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
            ->recordTitleAttribute('Dependencia')
            ->columns([
                TextColumn::make('codigo')
                    ->searchable(),
                TextColumn::make('nombre')
                    ->searchable(),
                IconColumn::make('rural')
                    ->boolean(),
                IconColumn::make('marginal')
                    ->boolean(),
                TextColumn::make('direccion')
                    ->searchable(),
                TextColumn::make('municipio_id')
                    ->label('Municipio')
                    ->searchable()
                    ->numeric()
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
            'index' => ManageDependencias::route('/'),
        ];
    }
}
