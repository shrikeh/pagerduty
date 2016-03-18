<?php

namespace spec\Shrikeh\PagerDuty\Repository\ScheduleRepository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use DateTimeImmutable;

use GuzzleHttp\Promise\PromiseInterface as Promise;
use Shrikeh\PagerDuty\HydratorBuilder;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Request\ScheduleRequest;
use Shrikeh\PagerDuty\UserId;
use Shrikeh\PagerDuty\ScheduleId;
use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;
use Psr\Http\Message\RequestInterface;

class ApiScheduleRepositorySpec extends ObjectBehavior
{
    function let(
        ScheduleRequest $scheduleRequest,
        HydratorBuilder $hydratorBuilder
    ) {
        $this->beConstructedWith($scheduleRequest, $hydratorBuilder);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\Repository\ScheduleRepository');
    }

    function it_returns_entries_for_the_user(
        $scheduleRequest,
        $hydratorBuilder,
        Hydrator $hydrator,
        Promise $promise,
        UserId $userId,
        ScheduleId $scheduleId
    ) {
        $start  = new DateTimeImmutable('now -1 month');
        $end    = new DateTimeImmutable('now');

        $scheduleRequest->entries($scheduleId, $start, $end, $userId)->willReturn($promise);
        $hydratorBuilder->scheduleEntryHydrator()->willReturn($hydrator);
        $this->entriesForUser(
            $scheduleId,
            $start,
            $end,
            $userId
        )->shouldBeAnInstanceOf('Shrikeh\PagerDuty\Collection\ScheduleEntryCollection');
    }
}
