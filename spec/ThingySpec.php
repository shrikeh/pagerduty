<?php

namespace spec\Shrikeh\PagerDuty;


use GuzzleHttp\Promise\PromiseInterface as Promise;
use Shrikeh\PagerDuty\Hydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ThingySpec extends ObjectBehavior
{
    function let(Promise $promise, Hydrator $hydrator)
    {
        $this->beConstructedWith($promise, $hydrator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\Thingy');
    }
}
