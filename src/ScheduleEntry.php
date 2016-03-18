<?php

namespace Shrikeh\PagerDuty;

use DateTimeImmutable;

class ScheduleEntry
{
    private $start;
    private $end;
    private $user;

    public function __construct(
        DateTimeImmutable $start,
        DateTimeImmutable $end,
        $user = null
    ) {
        $this->start = $start;
        $this->end = $end;
        $this->user = $user;
    }

    public static function fromRaw($start, $end, $user)
    {
      $start  = new DateTimeImmutable($start);
      $end    = new DateTimeImmutable($end);

      return new self($start, $end, $user);
    }
}
