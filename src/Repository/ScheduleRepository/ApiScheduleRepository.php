<?php

namespace Shrikeh\PagerDuty\Repository\ScheduleRepository;

use DateTimeImmutable;
use Shrikeh\PagerDuty\Request\ScheduleRequest;
use GuzzleHttp\Client as HttpScheduleClient;
use Shrikeh\PagerDuty\Repository\ScheduleRepository;
use Shrikeh\PagerDuty\ScheduleId;
use Shrikeh\PagerDuty\User;
use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection\PromiseScheduleEntryCollection;


class ApiScheduleRepository implements ScheduleRepository
{
    private $client;
    private $request;

    public function __construct(
        ScheduleRequest $request
    ) {
        $this->request = $request;
    }

  public function entriesForUser(
      ScheduleId $scheduleId,
      DateTimeImmutable $start,
      DateTimeImmutable $end,
      User $user
  ) {
        return $this->request->entries($scheduleId, $start, $end);
    }
}
