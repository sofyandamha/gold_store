<?php

namespace App\Filament\Resources\MasterPembayaranResource\Pages;

use App\Filament\Resources\MasterPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterPembayaran extends EditRecord
{
    protected static string $resource = MasterPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
