<?php

namespace App\Filament\Resources\MasterPembayaranResource\Pages;

use App\Filament\Resources\MasterPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterPembayarans extends ListRecords
{
    protected static string $resource = MasterPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
