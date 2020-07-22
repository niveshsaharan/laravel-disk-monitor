# Monitor metrics of Laravel disks

[![Latest Version on Packagist](https://img.shields.io/packagist/v/centire/laravel-disk-monitor.svg?style=flat-square)](https://packagist.org/packages/centire/laravel-disk-monitor)
![run-tests](https://github.com/niveshsaharan/laravel-disk-monitor/workflows/Tests/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/centire/laravel-disk-monitor.svg?style=flat-square)](https://packagist.org/packages/centire/laravel-disk-monitor)

laravel-disk-monitor can monitor the usage of the filesystems configured in Laravel. Currently only the amount of files a disk contains is monitored.

## Installation

You can install the package via composer:

```bash
composer require centire/laravel-disk-monitor
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Centire\DiskMonitor\DiskMonitorServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Centire\DiskMonitor\DiskMonitorServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    /*
     * The names of the disk you want to monitor.
     */
    'disk_names' => [
        'local',
    ],
];
```

Finally, you should schedule the `Centire\DiskMonitor\Commands\RecordsDiskMetricsCommand` to run daily.

```php
// in app/Console/Kernel.php

use \Centire\DiskMonitor\Commands\RecordsDiskMetricsCommand;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
       // ...
        $schedule->command(RecordsDiskMetricsCommand::class)->daily();
    }
}

```

## Usage

You can view the amount of files each monitored disk has, in the `disk_monitor_entries` table.

If you want to view the statistics in the browser add this macro to your routes file.

```php
// in a routes files

Route::diskMonitor('my-disk-monitor-url');
```

Now, you can see all statics when browsing `/my-disk-monitor-url`. Of course, you can use any url you want when using the `diskMonitor` route macro. We highly recommand using the `auth` middleware for this route, so guests can't see any data regarding your disks.

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email hey@nive.sh instead of using the issue tracker.

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [Nivesh](https://github.com/niveshsaharan)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
