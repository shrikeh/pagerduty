<?php

namespace spec\Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use GuzzleHttp\Promise\PromiseInterface as GuzzlePromise;

class PromiseScheduleEntryCollectionSpec extends ObjectBehavior
{
    function let(GuzzlePromise $promise)
    {
        $this->beConstructedWith($promise);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\Collection\ScheduleEntryCollection\PromiseScheduleEntryCollection');
    }
}
