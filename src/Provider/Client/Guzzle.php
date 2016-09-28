<?php

namespace Shrikeh\PagerDuty\Provider\Client;

use GuzzleHttp\Client as GuzzleClient;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Client\Guzzle as Client;
use Shrikeh\PagerDuty\Provider\Auth;
use Shrikeh\PagerDuty\Provider\Client as ClientServiceProvider;
use Shrikeh\PagerDuty\Provider\Http;

final class Guzzle implements ServiceProviderInterface, ClientServiceProvider
{
    const PROVIDER_GUZZLE_CLIENT = 'pagerduty.client.guzzle';

    public function register(Container $container)
    {
        $container = $this->guzzle($container);

        $container[static::PROVIDER_CLIENT_KEY] = function(Container $c) {
            return new Client($c[static::PROVIDER_GUZZLE_CLIENT]);
        };

        return $container;
    }

    private function guzzle(Container $container)
    {
        $container[static::PROVIDER_GUZZLE_CLIENT] = function(Container $c) {
            return new GuzzleClient([
              'base_uri' => $c[Http::PROVIDER_HTTP_DOMAIN],
              'timeout' => $c[Http::PROVIDER_HTTP_TIMEOUT],
              'headers' => [
                'Accept:' =>  'application/vnd.pagerduty+json;version=2',
                'Authorization' => sprintf('Token token=%s', $c[Auth::PROVIDER_AUTH_TOKEN])
              ]
            ]);
        };
        return $container;
    }
}
