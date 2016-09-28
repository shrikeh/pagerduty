<?php

namespace spec\Shrikeh\PagerDuty\Provider\Http;

use Pimple\Container;
use Shrikeh\PagerDuty\Provider\Http\Api;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiSpec extends ObjectBehavior
{
  function it_throws_an_exception_if_domain_is_not_set(
      Container $con
  ) {
      $con->offsetExists(Api::PROVIDER_HTTP_DOMAIN)->willReturn(false);
      $con->offsetSet(
          Api::PROVIDER_HTTP_DOMAIN,
          Argument::type('Shrikeh\PagerDuty\Http\DomainNotSet\ThrowHandler')
      )->shouldBeCalled();

      $this->register($con);
  }
}
