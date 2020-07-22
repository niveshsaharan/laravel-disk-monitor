<?php

namespace Centire\DiskMonitor\Commands;

use Illuminate\Console\Command;

class RecordDiskMetrics extends Command
{
    public $signature = 'disk-monitor';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
