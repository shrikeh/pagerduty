<?php

namespace spec\Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;
use Shrikeh\PagerDuty\Thingy;
use Shrikeh\PagerDuty\ScheduleEntry;

class PromiseScheduleEntryCollectionSpec extends ObjectBehavior
{
    function let(Thingy $thingy)
    {
        $this->beConstructedWith($thingy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(
            'Shrikeh\PagerDuty\Collection\ScheduleEntryCollection'
        );
    }

    function it_is_countable(
        ScheduleEntryCollection $collection,
        $thingy
    ) {
        $count = 3;
        $thingy->results()->willReturn($collection);
        $collection->count()->willReturn($count);
        $this->count()->shouldReturn($count);
    }
}
