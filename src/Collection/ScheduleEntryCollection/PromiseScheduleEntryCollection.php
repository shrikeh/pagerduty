<?php

namespace Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;

use IteratorAggregate;
use Shrikeh\PagerDuty\Thingy;
use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;

class PromiseScheduleEntryCollection implements ScheduleEntryCollection, IteratorAggregate
{

    private $collection;

    private $thingy;

    public function __construct(Thingy $thingy)
    {
        $this->thingy = $thingy;
    }

    public function count()
    {
        return $this->getIterator()->count();
    }


    public function getIterator()
    {
        return $this->hydrate();
    }

    private function hydrate()
    {
        if (!$this->collection) {
            $this->collection = $this->thingy->results();
        }
        return $this->collection;
    }

    private function collection(ScheduleEntryCollection $collection)
    {
        $this->collection = $collection;
    }
}
