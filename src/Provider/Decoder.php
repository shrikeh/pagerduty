<?php

namespace Shrikeh\PagerDuty\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Decoder\Json;

class Decoder implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['decoder'] = function($c) {
            return new Json();
        };
    }
}
