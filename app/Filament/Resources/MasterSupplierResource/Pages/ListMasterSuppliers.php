<?php

namespace App\Filament\Resources\MasterSupplierResource\Pages;

use App\Filament\Resources\MasterSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterSuppliers extends ListRecords
{
    protected static string $resource = MasterSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Create')
            ->icon('heroicon-o-document-plus'),
        ];
    }
}
