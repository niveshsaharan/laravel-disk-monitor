<?php

namespace Centire\DiskMonitor;

use Centire\DiskMonitor\Commands\RecordDiskMetricsCommand;
use Illuminate\Support\ServiceProvider;

class DiskMonitorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/disk-monitor.php' => config_path('disk-monitor.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/disk-monitor'),
            ], 'views');

            if (! class_exists('CreatePackageTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_disk_monitor_tables.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_disk_monitor_tables.php'),
                ], 'migrations');
            }

            $this->commands([
                RecordDiskMetricsCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'disk-monitor');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/disk-monitor.php', 'disk-monitor');
    }
}
