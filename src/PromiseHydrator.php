<?php

namespace Shrikeh\PagerDuty;

use Shrikeh\PagerDuty\PromiseCallback\FulfilledCallback;
use GuzzleHttp\Promise\PromiseInterface as Promise;

use Shrikeh\PagerDuty\Hydrator;

class PromiseHydrator
{
    private $promise;

    public function __construct(
        Promise $promise
    ) {
        $this->promise = $promise;
    }

    public function results(
        FulfilledCallback $fulfilled
    ) {
        $this->attach($fulfilled);
        $this->promise->wait();
    }

    private function attach($fulfilled)
    {
        $this->promise->then($fulfilled);
    }
}
