<?php

namespace App\Filament\Resources\MasterEmasResource\Pages;

use App\Filament\Resources\MasterEmasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterEmas extends EditRecord
{
    protected static string $resource = MasterEmasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
