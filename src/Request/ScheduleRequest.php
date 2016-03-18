<?php

namespace Shrikeh\PagerDuty\Request;

use DateTimeInterface;

interface ScheduleRequest
{
  public function entries(
      $scheduleId,
      DateTimeInterface $start,
      DateTimeInterface $end,
      $userId
  );
}
