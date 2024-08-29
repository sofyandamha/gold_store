<?php

namespace App\Filament\Resources\MasterHargaResource\Pages;

use App\Filament\Resources\MasterHargaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterHargas extends ListRecords
{
    protected static string $resource = MasterHargaResource::class;
    protected static ?string $title = 'Master Harga';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Create')
            ->icon('heroicon-o-document-plus'),
        ];
    }
}
