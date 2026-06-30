<?php

namespace App\Filament\Resources\TipoMovimientos\Pages;

use App\Filament\Resources\TipoMovimientos\TipoMovimientoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTipoMovimientos extends ManageRecords
{
    protected static string $resource = TipoMovimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
