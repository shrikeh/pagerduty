<?php

namespace spec\Shrikeh\PagerDuty\Request\Schedule;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use DateTimeImmutable;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Promise\PromiseInterface;

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

    function it_gets_entries(
        $client,
        DateTimeImmutable $start,
        DateTimeImmutable $end,
        PromiseInterface $promise
    )
    {
        $scheduleId = 12345;
        $client->sendAsync(
            Argument::type('GuzzleHttp\Psr7\Request'),
            Argument::any()
        )->willReturn($promise);
        $this->entries($scheduleId, $start, $end)->shouldReturn($promise);
    }
}
