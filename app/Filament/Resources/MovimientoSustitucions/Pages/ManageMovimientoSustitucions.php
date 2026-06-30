<?php

namespace App\Filament\Resources\MovimientoSustitucions\Pages;

use App\Filament\Resources\MovimientoSustitucions\MovimientoSustitucionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageMovimientoSustitucions extends ManageRecords
{
    protected static string $resource = MovimientoSustitucionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
