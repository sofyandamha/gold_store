<?php

namespace App\Filament\Resources\Menu\JualEmasResource\Pages;

use App\Filament\Resources\Menu\JualEmasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJualEmas extends EditRecord
{
    protected static string $resource = JualEmasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
