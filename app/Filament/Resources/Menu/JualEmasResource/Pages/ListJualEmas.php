<?php

namespace App\Filament\Resources\Menu\JualEmasResource\Pages;

use App\Filament\Resources\Menu\JualEmasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJualEmas extends ListRecords
{
    protected static string $resource = JualEmasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Create')
            ->icon('heroicon-o-document-plus'),
        ];
    }
}
