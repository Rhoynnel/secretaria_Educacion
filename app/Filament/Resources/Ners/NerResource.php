<?php

namespace App\Filament\Resources\Ners;

use App\Filament\Resources\Ners\Pages\CreateNer;
use App\Filament\Resources\Ners\Pages\EditNer;
use App\Filament\Resources\Ners\Pages\ListNers;
use App\Filament\Resources\Ners\Pages\ViewNer;
use App\Filament\Resources\Ners\Schemas\NerForm;
use App\Filament\Resources\Ners\Schemas\NerInfolist;
use App\Filament\Resources\Ners\Tables\NersTable;
use App\Models\Ner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NerResource extends Resource
{
    protected static ?string $model = Ner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Ner';

    public static function form(Schema $schema): Schema
    {
        return NerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNers::route('/'),
            'create' => CreateNer::route('/create'),
            'view' => ViewNer::route('/{record}'),
            'edit' => EditNer::route('/{record}/edit'),
        ];
    }
}
