<?php

namespace spec\Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;

use SplObjectStorage;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ScheduleEntryCollectionSpec extends ObjectBehavior
{
    public function let(SplObjectStorage $obj)
    {
        $this->beConstructedWith($obj);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\Collection\ScheduleEntryCollection');
    }
}
