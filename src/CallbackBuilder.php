<?php
namespace Shrikeh\PagerDuty;

use Iterator;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\PromiseCallback\FulfilledCallback\HydrationCallback;

class CallbackBuilder
{
    public function hydrationCallback(
        Hydrator $hydrator,
        Iterator $iterator
    ) {
        return new HydrationCallback($hydrator, $iterator);
    }
}
