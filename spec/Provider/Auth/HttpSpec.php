<?php

namespace spec\Shrikeh\PagerDuty\Provider\Auth;

use Pimple\Container;
use Shrikeh\PagerDuty\Provider\Auth\Http;
use Shrikeh\PagerDuty\Provider\Auth;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HttpSpec extends ObjectBehavior
{
    function it_throws_an_exception_if_token_is_not_set(
        Container $con
    ) {
        $con->offsetExists(Auth::PROVIDER_AUTH_TOKEN)->willReturn(false);
        $con->offsetSet(
            Auth::PROVIDER_AUTH_TOKEN,
            Argument::type('Shrikeh\PagerDuty\Auth\TokenNotSet\ThrowHandler')
        )->shouldBeCalled();

        $this->register($con);
    }

    function it_does_not_overwrite_an_existing_token(
        Container $con
    ) {
        $con->offsetExists(Auth::PROVIDER_AUTH_TOKEN)->willReturn(true);
        $con->offsetSet(
            Auth::PROVIDER_AUTH_TOKEN,
            Argument::any()
        )->shouldNotBeCalled();

        $this->register($con);
    }
}
