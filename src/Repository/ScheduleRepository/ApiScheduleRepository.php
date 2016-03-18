<?php

namespace Shrikeh\PagerDuty\Repository\ScheduleRepository;

use DateTimeImmutable;
use Shrikeh\PagerDuty\Thingy;
use Shrikeh\PagerDuty\HydratorBuilder;
use Shrikeh\PagerDuty\Request\ScheduleRequest;
use Shrikeh\PagerDuty\Repository\ScheduleRepository;
use Shrikeh\PagerDuty\ScheduleId;
use Shrikeh\PagerDuty\UserId;
use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection\PromiseScheduleEntryCollection;


class ApiScheduleRepository implements ScheduleRepository
{
    private $request;

    private $hydratorBuilder;

    public function __construct(
        ScheduleRequest $request,
        HydratorBuilder $hydratorBuilder
    ) {
        $this->request = $request;
        $this->hydratorBuilder = $hydratorBuilder;
    }

  public function entriesForUser(
      ScheduleId $scheduleId,
      DateTimeImmutable $start,
      DateTimeImmutable $end,
      UserId $userId
  ) {
        $data = $this->request->entries($scheduleId, $start, $end, $userId);
        $thingy = new Thingy($data, $this->hydratorBuilder->scheduleEntryHydrator());
        return new PromiseScheduleEntryCollection($thingy);
    }
}
