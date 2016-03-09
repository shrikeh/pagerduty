<?php

namespace Shrikeh\PagerDuty\Request;

use DateTimeImmutable;
use Shrikeh\PagerDuty\ScheduleId;
use Shrikeh\PagerDuty\UserId;

interface ScheduleRequest
{
  public function entries(
      ScheduleId $scheduleId,
      DateTimeImmutable $start,
      DateTimeImmutable $end,
      UserId $userId = null
  );
}
