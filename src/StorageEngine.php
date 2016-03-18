<?php

namespace Shrikeh\PagerDuty;

use SplObjectStorage;

class StorageEngine
{
    public function scheduleEntryCollection($results)
    {
        $spl = $results->fetch(new SplObjectStorage());
        return new ScheduleEntryCollection($spl);
    }
}
