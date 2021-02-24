<?php

namespace Kubpro\PulPal\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Kubpro\PulPal\Facades\PulPal;
use Kubpro\PulPal\PulPalService;

class PulPalServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $loader = AliasLoader::getInstance();

        $loader->alias('Pulpal', PulPal::class);

        $this->app->singleton('pulpal', function () {
            return new PulPalService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishFiles();
        $this->registerConfig();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/pulpal.php', 'pulpal'
        );
    }


    public function publishFiles(){

        $this->publishes([
            __DIR__ . '/../../config/pulpal.php' => config_path('pulpal.php'),
        ], 'pulpal');
    }

}
