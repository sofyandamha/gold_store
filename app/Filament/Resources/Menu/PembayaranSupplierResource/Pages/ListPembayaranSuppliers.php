<?php

namespace App\Filament\Resources\Menu\PembayaranSupplierResource\Pages;

use App\Filament\Resources\Menu\PembayaranSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembayaranSuppliers extends ListRecords
{
    protected static string $resource = PembayaranSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Create')
            ->icon('heroicon-o-document-plus'),
        ];
    }
}
