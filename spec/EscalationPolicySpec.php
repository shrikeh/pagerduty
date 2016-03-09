<?php

namespace spec\Shrikeh\PagerDuty;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EscalationPolicySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\EscalationPolicy');
    }
}
