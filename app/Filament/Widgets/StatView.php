<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\BeliEmas;
use App\Models\PemasukanBarangTransaksi;

class StatView extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // $data = BeliEmas::with('masterharga')->first();
        // $beliEmas = $data->masterharga->sum('hrg_beli');
        $pbTransaksi = PemasukanBarangTransaksi::sum('harga_modal');

        return [
            // Stat::make('Total Harga Beli Emas :', $beliEmas)->icon('heroicon-s-banknotes'),
            Stat::make('Total Harga Modal (Pemasukan Barang) :', $pbTransaksi),
        ];
    }
}
