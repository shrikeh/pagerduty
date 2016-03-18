<?php

namespace spec\Shrikeh\PagerDuty;

use Iterator;

use Shrikeh\PagerDuty\PromiseCallback\FulfilledCallback;
use GuzzleHttp\Promise\PromiseInterface as Promise;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class PromiseHydratorSpec extends ObjectBehavior
{
    function let(Promise $promise) {
        $this->beConstructedWith($promise);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\PromiseHydrator');
    }

    function it_can_hydrate_from_a_promise(
        $promise,
        FulfilledCallback $callback
    )
    {
      $promise->then($callback)->shouldBeCalled();
      $promise->wait()->shouldBeCalled();
      $this->results($callback);
    }
}
