<?php

namespace Shrikeh\PagerDuty\Repository;

use \DateTimeImmutable;
use Shrikeh\PagerDuty\UserId;
use Shrikeh\PagerDuty\ScheduleId;

interface ScheduleRepository
{
  /**
   * @return ScheduleEntryCollection
   */
    public function entriesforUser(
        ScheduleId $scheduleId,
        DateTimeImmutable $start,
        DateTimeImmutable $end,
        UserId $user
    );
}
