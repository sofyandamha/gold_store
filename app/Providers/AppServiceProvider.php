<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\HtmlString;
use Filament\Facades\Filament;
use Illuminate\Contracts\View\View;
use Filament\Support\Assets\AlpineComponent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Model::unguard();
        FilamentAsset::register([
            Js::make('widget-harga-emas-script', 'https://harga-emas.org/widget/widget.js'),
        ]);
        
    }
}
