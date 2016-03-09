<?php

namespace spec\Shrikeh\PagerDuty\Hydrator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ScheduleEntrySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\Hydrator\ScheduleEntry');
    }
}
