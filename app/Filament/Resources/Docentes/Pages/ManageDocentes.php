<?php

namespace App\Filament\Resources\Docentes\Pages;

use App\Filament\Resources\Docentes\DocenteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDocentes extends ManageRecords
{
    protected static string $resource = DocenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
