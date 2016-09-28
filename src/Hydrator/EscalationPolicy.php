<?php

namespace Shrikeh\PagerDuty\Hydrator;

use stdClass;
use Shrikeh\PagerDuty\EscalationPolicy\OnCall;


class EscalationPolicy
{
    public function fromStdClass(stdClass $dto)
    {
        return new OnCall();
    }
}
