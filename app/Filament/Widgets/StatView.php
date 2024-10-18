<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\BeliEmas;

class StatView extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $data = BeliEmas::with('masterharga')->first();
        $beliEmas = $data->masterharga->sum('hrg_beli');

        return [
            Stat::make('Total Harga Beli Emas :', $beliEmas),
            // Stat::make('Paid', $payments),
            // Stat::make('Due', fn () => $dues),
            // Stat::make('Deposited', $deposits),
        ];
    }
}
