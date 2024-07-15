<?php

namespace App\Filament\Resources\MasterCustomerResource\Pages;

use App\Filament\Resources\MasterCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterCustomer extends EditRecord
{
    protected static string $resource = MasterCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
