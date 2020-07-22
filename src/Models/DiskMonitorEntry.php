<?php

namespace Centire\DiskMonitor\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DiskMonitorEntry
 *
 * @package \Centire\DiskMonitor\Models
 */
class DiskMonitorEntry extends Model
{
    public $guarded = [];

    public $casts = [
        'file_count' => 'integer',
    ];

    protected static function last(): ?self
    {
        return static::orderByDesc('id')->first();
    }
}
