<?php

namespace App\Filament\Resources\TipoNominas\Pages;

use App\Filament\Resources\TipoNominas\TipoNominaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTipoNominas extends ManageRecords
{
    protected static string $resource = TipoNominaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
