<?php

namespace App\Filament\Resources\MasterCustomerResource\Pages;

use App\Filament\Resources\MasterCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterCustomers extends ListRecords
{
    protected static string $resource = MasterCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Create')
            ->icon('heroicon-o-document-plus'),
        ];
    }
}
