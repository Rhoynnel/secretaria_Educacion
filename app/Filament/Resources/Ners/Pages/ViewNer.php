<?php

namespace App\Filament\Resources\Ners\Pages;

use App\Filament\Resources\Ners\NerResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNer extends ViewRecord
{
    protected static string $resource = NerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
