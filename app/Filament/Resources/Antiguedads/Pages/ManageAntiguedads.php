<?php

namespace App\Filament\Resources\Antiguedads\Pages;

use App\Filament\Resources\Antiguedads\AntiguedadResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageAntiguedads extends ManageRecords
{
    protected static string $resource = AntiguedadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
