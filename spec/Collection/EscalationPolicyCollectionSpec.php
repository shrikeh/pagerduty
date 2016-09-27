<?php

namespace spec\Shrikeh\PagerDuty\Collection;

use Shrikeh\PagerDuty\Collection\EscalationPolicyCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EscalationPolicyCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EscalationPolicyCollection::class);
    }
}
