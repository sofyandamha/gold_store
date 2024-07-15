<?php

namespace App\Filament\Resources\MasterCustomerResource\Pages;

use App\Filament\Resources\MasterCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMasterCustomer extends CreateRecord
{
    protected static string $resource = MasterCustomerResource::class;
}
