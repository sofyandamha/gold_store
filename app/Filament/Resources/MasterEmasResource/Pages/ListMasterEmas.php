<?php

namespace App\Filament\Resources\MasterEmasResource\Pages;

use App\Filament\Resources\MasterEmasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterEmas extends ListRecords
{
    protected static string $resource = MasterEmasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Create')
            ->icon('heroicon-o-document-plus'),
        ];
    }
}
