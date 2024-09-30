<?php

namespace App\Filament\Resources\PemasukanBarangMasmurResource\Pages;

use App\Filament\Resources\PemasukanBarangMasmurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemasukanBarangMasmur extends EditRecord
{
    protected static string $resource = PemasukanBarangMasmurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
