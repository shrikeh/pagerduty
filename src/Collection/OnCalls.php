<?php

namespace Shrikeh\PagerDuty\Collection;

use IteratorIterator;
use OutOfBoundsException;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\OnCall;

final class OnCalls extends IteratorIterator implements Collection
{
    use \Shrikeh\PagerDuty\Collection\ImmutableCollection;

    public function __construct($onCalls)
    {
        parent::__construct(new \SplObjectStorage());

        foreach ($onCalls as $oncall) {
            $this->appendOnCall($oncall);
        }
        $this->getInnerIterator()->rewind();
    }

    private function appendOnCall(OnCall $oncall)
    {
        $this->getInnerIterator()->attach($oncall);
    }

    public function seek($level)
    {
        foreach ($this->getInnerIterator() as $oncall) {
            if ($oncall->level() === $level) {
                return $oncall;
            }
        }
        $msg = 'No on call results match level %d';
        throw new OutOfBoundsException(sprintf($msg, $level));
    }
}
