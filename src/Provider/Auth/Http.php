<?php

namespace Shrikeh\PagerDuty\Provider\Auth;

use Shrikeh\PagerDuty\Provider\Auth;
use Shrikeh\PagerDuty\Auth\TokenNotSet\ThrowHandler as TokenNotSetHandler;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

final class Http implements Auth, ServiceProviderInterface
{
    public function register(Container $container)
    {
        if (! $container->offsetExists(static::PROVIDER_AUTH_TOKEN) ) {
            $container[static::PROVIDER_AUTH_TOKEN] = $this->notSetHandler();
        }
    }

    private function notSetHandler()
    {
        $msg = 'You must set the key %s with your PagerDuty API token';
        return new TokenNotSetHandler(
            sprintf($msg, static::PROVIDER_AUTH_TOKEN)
        );
    }
}
