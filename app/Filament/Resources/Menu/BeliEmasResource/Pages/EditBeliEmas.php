<?php

namespace App\Filament\Resources\Menu\BeliEmasResource\Pages;

use App\Filament\Resources\Menu\BeliEmasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBeliEmas extends EditRecord
{
    protected static string $resource = BeliEmasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
