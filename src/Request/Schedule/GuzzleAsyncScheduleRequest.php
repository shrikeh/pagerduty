<?php

namespace Shrikeh\PagerDuty\Request\Schedule;

use DateTime;
use DateTimeInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

use Shrikeh\PagerDuty\Request\GuzzleRequest;

use Shrikeh\PagerDuty\Request\ScheduleRequest;

class GuzzleAsyncScheduleRequest implements ScheduleRequest
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public final function entries(
        $scheduleId,
        DateTimeInterface $start,
        DateTimeInterface $end,
        $userId = null
    ) {
        $request = $this->request(
            GuzzleRequest::GET,
            "schedules/$scheduleId/entries"
        );

        $query = [
            'since' => $start->format(DateTime::ISO8601),
            'until' => $end->format(DateTime::ISO8601),
            'overflow' => 'true'
        ];
        if ($userId) {
            $query['user_id'] = $user->id();
        }
        return $this->send($request, $query);

    }

    private final function send(Request $request, array $query = array())
    {
        return $this->client->sendAsync(
            $request,
            ['query' => $query]
        );
    }

    private final function request($method, $url)
    {
      return new Request('GET', $url);
    }
}
