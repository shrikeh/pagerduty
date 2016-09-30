<?php

namespace Shrikeh\PagerDuty\Entity\OnCall;

use Shrikeh\PagerDuty\Entity\OnCall as OnCallInterface;

final class OnCall implements OnCallInterface
{
    private $level;

    private $user;

    private $escalationPolicy;

    public function level()
    {
        return $this->level;
    }

    public function user()
    {
        return $this->user;
    }

    public function escalationPolicy()
    {
        return $this->escalationPolicy;
    }
}
