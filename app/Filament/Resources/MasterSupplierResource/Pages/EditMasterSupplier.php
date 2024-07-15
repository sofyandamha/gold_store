<?php

namespace App\Filament\Resources\MasterSupplierResource\Pages;

use App\Filament\Resources\MasterSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterSupplier extends EditRecord
{
    protected static string $resource = MasterSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
