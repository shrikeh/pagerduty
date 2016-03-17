<?php

namespace Shrikeh\PagerDuty\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use GuzzleHttp\Client;

class GuzzleHttp implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['client'] = function($c) {
            return new Client(['base_uri' => $c['baseUri'], 'headers' => $c['headers']]);
        };

        $container['scheduleRequest'] = function($c) {
            return new GuzzleAsyncScheduleRequest($c['client']);
        };
    }
}
