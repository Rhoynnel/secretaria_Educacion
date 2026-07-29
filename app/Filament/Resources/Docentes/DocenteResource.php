<?php

namespace App\Filament\Resources\Docentes;

use App\Filament\Resources\Docentes\Pages\ManageDocentes;
use App\Models\Docente;
use App\Models\Nivel;
use App\Models\Nomina_Movimiento;
use App\Models\Nomina_Regular;
use App\Models\Persona;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DocenteResource extends Resource
{
    protected static ?string $model = Docente::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Docente';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_persona')
                    ->label('Cedula')
                    ->required()
                    ->numeric()
                    ->opcion(),
                TextInput::make('id_cargo')
                    ->required()
                    ->numeric(),
                TextInput::make('id_dependencia')
                    ->required()
                    ->numeric(),
                DatePicker::make('fecha_ingreso')
                    ->required(),
                TextInput::make('id_banco')
                    ->required()
                    ->numeric(),
                TextInput::make('cuenta_bancaria')
                    ->required(),
                DatePicker::make('fecha_nomina')
                    ->required(),
                TextInput::make('id_tipo_nomina')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id_persona')
                    ->numeric(),
                TextEntry::make('id_cargo')
                    ->numeric(),
                TextEntry::make('id_dependencia')
                    ->numeric(),
                TextEntry::make('fecha_ingreso')
                    ->date(),
                TextEntry::make('id_banco')
                    ->numeric(),
                TextEntry::make('cuenta_bancaria'),
                TextEntry::make('fecha_nomina')
                    ->date(),
                TextEntry::make('id_tipo_nomina')
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
            ->recordTitleAttribute('Docente')
            ->columns([
                TextColumn::make('id_persona')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_cargo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_dependencia')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fecha_ingreso')
                    ->date()
                    ->sortable(),
                TextColumn::make('id_banco')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cuenta_bancaria')
                    ->searchable(),
                TextColumn::make('fecha_nomina')
                    ->date()
                    ->sortable(),
                TextColumn::make('id_tipo_nomina')
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
            'index' => ManageDocentes::route('/'),
        ];
    }
}
