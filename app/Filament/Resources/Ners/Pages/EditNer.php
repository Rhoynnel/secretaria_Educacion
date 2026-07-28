<?php

namespace App\Filament\Resources\Ners\Pages;

use App\Filament\Resources\Ners\NerResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditNer extends EditRecord
{
    protected static string $resource = NerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
