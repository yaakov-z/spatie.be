<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentsServiceProvider extends ServiceProvider
{
    public function register()
    {
        Blade::component('layout.default', 'page');

        Blade::component('front.pages.tools.operators.layout.operators', 'operators');
    }
}
