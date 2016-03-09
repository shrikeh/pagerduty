<?php

namespace Shrikeh\PagerDuty\Request\Schedule;

use DateTime;
use DateTimeImmutable;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Client;
use Shrikeh\PagerDuty\UserId;
use Shrikeh\PagerDuty\ScheduleId;
use Shrikeh\PagerDuty\Request\ScheduleRequest;


class GuzzleAsyncScheduleRequest implements ScheduleRequest
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function entries(
        ScheduleId $scheduleId,
        DateTimeImmutable $start,
        DateTimeImmutable $end,
        UserId $userId = null
    ) {
        $request = new GuzzleRequest(
          'GET',
          "schedules/$scheduleId/entries"
        );
        $query = [
            'since' => $start->format(DateTime::ISO8601),
            'until' => $end->format(DateTime::ISO8601),
            'overflow' => 'true'
        ];
        if ($userId) {
            $query['user_id'] = $userId;
        }
        $data = $this->client->sendAsync(
            $request,
            ['query' => $query]
        );
        return new PromiseScheduleEntryCollection($data);
    }
}
