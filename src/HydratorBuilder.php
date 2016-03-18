<?php

namespace Shrikeh\PagerDuty;

class HydratorBuilder
{
    public function scheduleEntryHydrator()
    {
        $decoder = new Json();
        return new ScheduleEntryHydrator($decoder);
    }
}
