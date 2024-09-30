<?php

namespace App\Filament\Resources\PemasukanBarangMasmurResource\Pages;

use App\Filament\Resources\PemasukanBarangMasmurResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemasukanBarangMasmurs extends ListRecords
{
    protected static string $resource = PemasukanBarangMasmurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
