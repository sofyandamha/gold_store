<?php

namespace App\Filament\Resources\HargaEmasResource\Widgets;

use Filament\Widgets\ChartWidget;

class CustomerOverview extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
            'aaa'
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
