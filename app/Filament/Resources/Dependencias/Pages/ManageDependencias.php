<?php

namespace App\Filament\Resources\Dependencias\Pages;

use App\Filament\Resources\Dependencias\DependenciaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDependencias extends ManageRecords
{
    protected static string $resource = DependenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
