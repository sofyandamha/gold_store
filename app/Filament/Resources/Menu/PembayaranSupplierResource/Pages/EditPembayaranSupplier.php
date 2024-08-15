<?php

namespace App\Filament\Resources\Menu\PembayaranSupplierResource\Pages;

use App\Filament\Resources\Menu\PembayaranSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPembayaranSupplier extends EditRecord
{
    protected static string $resource = PembayaranSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
