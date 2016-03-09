<?php

namespace spec\Shrikeh\PagerDuty\Repository\ScheduleRepository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use DateTimeImmutable;
use GuzzleHttp\Client as GuzzleClient;
use Shrikeh\PagerDuty\EmailAddress;
use Shrikeh\PagerDuty\Request\ScheduleRequest;
use Shrikeh\PagerDuty\User;
use Shrikeh\PagerDuty\ScheduleId;
use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;
use Psr\Http\Message\RequestInterface;

class ApiScheduleRepositorySpec extends ObjectBehavior
{
    function let(ScheduleRequest $scheduleRequest)
    {
        $this->beConstructedWith($scheduleRequest);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\Repository\ScheduleRepository');
    }

    function it_returns_entries_for_the_user(
        $scheduleRequest,
        User $user,
        ScheduleId $scheduleId,
        ScheduleEntryCollection $entries
    ) {
        $start  = new DateTimeImmutable('now -1 month');
        $end    = new DateTimeImmutable('now');

        $scheduleRequest->entries($scheduleId, $start, $end)->willReturn($entries);

        $this->entriesForUser(
            $scheduleId,
            $start,
            $end,
            $user
        )->shouldReturn($entries);
    }
}
