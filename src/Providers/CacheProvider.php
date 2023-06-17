<?php

namespace Tots\CacheDatabase\Providers;

use Illuminate\Support\ServiceProvider;

class CacheProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register migrations
        if($this->app->runningInConsole()){
            $this->registerMigrations();
        }
    }
    /**
     * Register migrations library
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $mainPath = database_path('migrations');
        $paths = array_merge([
            './vendor/tots/cache-database-lumen/database/migrations'
        ], [$mainPath]);
        $this->loadMigrationsFrom($paths);
    }
}
