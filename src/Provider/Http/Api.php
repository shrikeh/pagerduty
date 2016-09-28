<?php

namespace Shrikeh\PagerDuty\Provider\Http;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Provider\Http;
use Shrikeh\PagerDuty\Http\DomainNotSet\ThrowHandler as DomainNotSetHandler;

final class Api implements ServiceProviderInterface, Http
{
    public function register(Container $container)
    {
        if (! $container->offsetExists(static::PROVIDER_HTTP_DOMAIN)) {
            $container[static::PROVIDER_HTTP_DOMAIN] = $this->notSetHandler();
        }
        //$container[static::PROVIDER_HTTP_TIMEOUT] = '2';

    }

    private function notSetHandler()
    {
        $msg = 'You must set the key %s with your PagerDuty API domain';
        return new DomainNotSetHandler(
            sprintf($msg, static::PROVIDER_HTTP_DOMAIN)
        );
    }
}
