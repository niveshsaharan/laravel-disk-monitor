<?php

namespace Centire\DiskMonitor\Tests\Feature\Commands;

use Centire\DiskMonitor\Commands\RecordDiskMetricsCommand;
use Centire\DiskMonitor\Models\DiskMonitorEntry;
use Centire\DiskMonitor\Tests\TestCase;
use Illuminate\Support\Facades\Storage;

/**
 * Class RecordDiskMetricsCommandTest
 *
 * @package \Centire\DiskMonitor\Tests\Feature\Commands
 */
class RecordDiskMetricsCommandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Storage::fake('local');
    }

    /**
     * @test
     */
    public function it_will_record_the_file_count_for_a_disk()
    {
        $this->artisan(RecordDiskMetricsCommand::class)->assertExitCode(0);
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(0, $entry->file_count);

        Storage::disk('local')->put('test.txt', 'test');
        $this->artisan(RecordDiskMetricsCommand::class)->assertExitCode(0);
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(1, $entry->file_count);
    }
}
