<?php

namespace spec\Shrikeh\PagerDuty\Auth\TokenNotSet;

use Pimple\Container;
use Shrikeh\PagerDuty\Auth\TokenNotSetException;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ThrowHandlerSpec extends ObjectBehavior
{
    function it_throws_a_token_not_set_exception()
    {
        $msg = 'test';
        $this->beConstructedWith($msg);
        $this->shouldThrow(new TokenNotSetException($msg))->duringThrow();
    }

    function it_is_invokable(
        Container $c
    ) {
        $msg = 'test';
        $this->beConstructedWith($msg);
        $this->shouldThrow(new TokenNotSetException($msg))
            ->during('__invoke', array($c));
    }
}
