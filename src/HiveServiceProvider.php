<?php

namespace FWM\Hive;

use Illuminate\Support\ServiceProvider;

class HiveServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/hive.php');
        $this->publishes([$source => config_path('hive.php')]);
        $this->mergeConfigFrom($source, 'hive');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
