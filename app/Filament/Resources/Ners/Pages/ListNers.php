<?php

namespace App\Filament\Resources\Ners\Pages;

use App\Filament\Resources\Ners\NerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNers extends ListRecords
{
    protected static string $resource = NerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
