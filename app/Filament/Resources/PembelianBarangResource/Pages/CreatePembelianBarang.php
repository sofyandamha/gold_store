<?php

namespace App\Filament\Resources\PembelianBarangResource\Pages;

use App\Filament\Resources\PembelianBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePembelianBarang extends CreateRecord
{
    protected static string $resource = PembelianBarangResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
