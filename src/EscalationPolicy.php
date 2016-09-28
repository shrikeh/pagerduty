<?php

namespace Shrikeh\PagerDuty;

interface EscalationPolicy
{
    public function summary();

    public function self();
}
