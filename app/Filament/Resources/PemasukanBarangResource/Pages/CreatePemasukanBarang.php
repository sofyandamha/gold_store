<?php

namespace App\Filament\Resources\PemasukanBarangResource\Pages;

use App\Filament\Resources\PemasukanBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePemasukanBarang extends CreateRecord
{
    protected static string $resource = PemasukanBarangResource::class;

     protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    // protected function mutateFormData(array $data): array
    // {
    //     $totalB = array_sum(array_column($data['berat_bersih'], 'value'));
    //     $totalA = $data['total_berat_pembelian'];

    //     if ($totalB !== $totalA) {
    //         throw ValidationException::withMessages([
    //             'berat_bersih' => ['Total B (' . $totalB . ') harus sama dengan Total A (' . $totalA . ')'],
    //         ]);
    //     }

    //     return $data;
    // }
}
