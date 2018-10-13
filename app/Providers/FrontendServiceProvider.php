<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->topMenu();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    private function topMenu()
    {
        View::composer(['site.layouts.main','site.index'], function($view) {
            $view->with('menuServiceRows',\App\Service::orderBy('sort')->get());
            $view->with('blocks', \App\CmsSetting::where('code','base')->first()->getValue());
        });
    }
}
