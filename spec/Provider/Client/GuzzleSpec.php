<?php

namespace spec\Shrikeh\PagerDuty\Provider\Client;

use Pimple\Container;
use Shrikeh\PagerDuty\Provider\Client\Guzzle as GuzzleProvider;
use Shrikeh\PagerDuty\Provider\Client as ClientServiceProvider;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuzzleSpec extends ObjectBehavior
{
    function it_registers_a_client_with_the_container(
        Container $con
    )
    {
        $con->offsetSet(
            ClientServiceProvider::PROVIDER_CLIENT_KEY,
            Argument::type('Closure')
        )->shouldBeCalled();
        $con->offsetSet(
            GuzzleProvider::PROVIDER_GUZZLE_CLIENT,
            Argument::type('Closure')
        )->shouldBeCalled();
        $this->register($con);
    }
}
