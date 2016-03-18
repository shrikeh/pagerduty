<?php

namespace Shrikeh\PagerDuty;

use Shrikeh\PagerDuty\CallbackMessage;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\CallbackBuilder;
use GuzzleHttp\Promise\PromiseInterface as Promise;

use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection\ScheduleEntryCollection;

class Thingy
{
    private $decoder;
    private $hydrator;
    private $callbackBuilder;

    public function __construct(Promise $promise, Hydrator $hydrator)
    {
      $this->promise = $promise;
      $this->hydrator = $hydrator;
      $this->callbackBuilder = new CallbackBuilder();
    }

    private function registerCallback($spl)
    {
        $callback = $this->callbackBuilder->hydrationCallback($this->hydrator, $spl);
        $this->promise->then($callback);
    }

    public function results()
    {
        $suitcase = new CallbackMessage();
        $this->registerCallback($suitcase);
        $this->promise->wait();
        return $suitcase->get();
    }
}
