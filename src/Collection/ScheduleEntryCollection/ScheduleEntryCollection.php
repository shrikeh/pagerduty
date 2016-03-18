<?php

namespace Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;

use ArrayAccess;
use SplObjectStorage;
use Shrikeh\PagerDuty\ScheduleEntry;
use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection as ScheduleEntryCollectionInterface;

class ScheduleEntryCollection implements ScheduleEntryCollectionInterface
{
    private $scheduleEntries;

    public function __construct(ArrayAccess $scheduleEntries)
    {
        $this->scheduleEntries = new SplObjectStorage();
        foreach ($scheduleEntries as $entry) {
          $this->addScheduleEntry($entry);
        }
    }

    private function addScheduleEntry(ScheduleEntry $entry)
    {
        $this->scheduleEntries->attach($entry);
    }

    public function count()
    {
        return $this->getIterator()->count();
    }

    public function getIterator()
    {
        return $this->scheduleEntries;
    }
}
