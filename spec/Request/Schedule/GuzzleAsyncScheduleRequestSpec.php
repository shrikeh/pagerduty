<?php

namespace spec\Shrikeh\PagerDuty\Request\Schedule;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use GuzzleHttp\Client as GuzzleClient;

class GuzzleAsyncScheduleRequestSpec extends ObjectBehavior
{
    function let(GuzzleClient $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\Request\ScheduleRequest');
    }
}
