<?php

namespace Centire\DiskMonitor\Http\Controllers;

use Centire\DiskMonitor\Models\DiskMonitorEntry;

/**
 * Class DiskMetricsController
 *
 * @package \Centire\DiskMonitor\Http\Controllers
 */
class DiskMetricsController
{
    public function __invoke()
    {
        $entries = DiskMonitorEntry::latest()->get();

        return view('disk-monitor::entries', compact('entries'));
    }
}
