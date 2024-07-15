<?php

namespace App\Filament\Resources\MasterHargaResource\Pages;

use App\Filament\Resources\MasterHargaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterHarga extends EditRecord
{
    protected static string $resource = MasterHargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
