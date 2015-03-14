<?php

namespace FWM\Hive;

use Illuminate\Support\ServiceProvider;

/**
 * Class HiveServiceProvider.
 */
class HiveServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/hive.php');
        $this->publishes([$source => config_path('hive.php')]);
        $this->mergeConfigFrom($source, 'hive');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
