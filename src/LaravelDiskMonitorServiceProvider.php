<?php

namespace Centire\LaravelDiskMonitor;

use Illuminate\Support\ServiceProvider;
use Centire\LaravelDiskMonitor\Commands\LaravelDiskMonitorCommand;

class LaravelDiskMonitorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-disk-monitor.php' => config_path('laravel-disk-monitor.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-disk-monitor'),
            ], 'views');

            if (! class_exists('CreatePackageTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_laravel_disk_monitor_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_laravel_disk_monitor_table.php'),
                ], 'migrations');
            }

            $this->commands([
                LaravelDiskMonitorCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-disk-monitor');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-disk-monitor.php', 'laravel-disk-monitor');
    }
}
