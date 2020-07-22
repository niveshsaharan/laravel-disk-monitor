<?php

namespace Centire\LaravelDiskMonitor;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Centire\LaravelDiskMonitor\LaravelDiskMonitor
 */
class LaravelDiskMonitorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-disk-monitor';
    }
}
