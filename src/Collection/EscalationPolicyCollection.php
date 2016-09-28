<?php

namespace Shrikeh\PagerDuty\Collection;

use SplObjectStorage;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\EscalationPolicy;
use Shrikeh\PagerDuty\Collection\ImmutableCollection;

class EscalationPolicyCollection implements Collection
{
    use ImmutableCollection;

    public function __construct($escalationPolicies)
    {
        $this->collection = new SplObjectStorage();

        foreach ($escalationPolicies as $policy) {
            $this->appendPolicy($policy);
        }
        $this->collection->rewind();
    }

    private function appendPolicy(EscalationPolicy $policy)
    {
        $this->collection->attach($policy);
    }
}
