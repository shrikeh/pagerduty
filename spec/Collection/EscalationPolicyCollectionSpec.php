<?php

namespace spec\Shrikeh\PagerDuty\Collection;

use Shrikeh\PagerDuty\EscalationPolicy;
use Shrikeh\PagerDuty\Collection\EscalationPolicyCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EscalationPolicyCollectionSpec extends ObjectBehavior
{

    public function let(
        EscalationPolicy $policy1,
        EscalationPolicy $policy2,
        EscalationPolicy $policy3
    ) {
        $policies = [$policy1, $policy2, $policy3];
        $this->beConstructedWith($policies);
    }

    function it_allows_iterating_over_escalation_policies(
        $policy1,
        $policy2
    ) {
        $this->current()->shouldReturn($policy1);
        $this->next();
        $this->current()->shouldReturn($policy2);
        $this->rewind();
        $this->current()->shouldReturn($policy1);
    }

    function it_throws_an_exception_if_you_try_to_set_a_policy(
        $policy1
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetSet($policy1, 'foo');
    }

    function it_throws_an_exception_if_you_try_to_unset_a_policy(
        $policy1
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetUnset($policy1);
    }
}
