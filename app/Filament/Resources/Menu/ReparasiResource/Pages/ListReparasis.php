<?php

namespace App\Filament\Resources\Menu\ReparasiResource\Pages;

use App\Filament\Resources\Menu\ReparasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReparasis extends ListRecords
{
    protected static string $resource = ReparasiResource::class;
    protected static ?string $title = 'Reparasi';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Create')
            ->icon('heroicon-o-document-plus'),
        ];
    }
}
