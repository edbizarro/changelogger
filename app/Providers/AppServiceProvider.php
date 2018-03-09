<?php

namespace App\Providers;

use App\Libs\Changelog;
use App\Libs\ConfigReader;
use App\Libs\Yaml;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Changelog::class, function () {
            return new Changelog(new ConfigReader(new Yaml()), new Yaml());
        });
    }
}
