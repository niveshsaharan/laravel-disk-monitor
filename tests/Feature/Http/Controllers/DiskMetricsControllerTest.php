<?php

namespace Centire\DiskMonitor\Tests\Feature\Http\Controllers;

use Centire\DiskMonitor\Tests\TestCase;

/**
 * Class DiskMetricsControllerTest
 *
 * @package \Centire\DiskMonitor\Tests\Feature\Http\Controllers
 */
class DiskMetricsControllerTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_display_the_list_of_entries()
    {
        $this->get('disk-monitor')
            ->assertOk();
    }
}
