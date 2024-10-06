<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\HtmlString;

class MyDashboard extends Widget
{
    protected static string $view = 'filament.widgets.my-dashboard';


    public function getData(): array
    {
        return [
            'title' => 'My Custom Widget',
            'value' => 'Some data here',
        ];
    }

    public function getTitle(): string
    {
        return 'Harga Emas Hari Ini: ';
    }
}
