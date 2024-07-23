<?php

namespace App\Filament\Resources\Menu\BeliEmasResource\Pages;

use App\Filament\Resources\Menu\BeliEmasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeliEmas extends ListRecords
{
    protected static string $resource = BeliEmasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
