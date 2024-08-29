<?php

namespace App\Filament\Resources\MasterPembayaranResource\Pages;

use App\Filament\Resources\MasterPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterPembayarans extends ListRecords
{
    protected static string $resource = MasterPembayaranResource::class;
    protected static ?string $title = 'Master Pembayaran';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Create')
            ->icon('heroicon-o-document-plus'),
        ];
    }
}
