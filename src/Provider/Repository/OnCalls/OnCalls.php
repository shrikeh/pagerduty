<?php

namespace Shrikeh\PagerDuty\Provider\Repository\OnCalls;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Parser\OnCall\OnCallParser;
use Shrikeh\PagerDuty\Provider\Client;
use Shrikeh\PagerDuty\Provider\Decoder;
use Shrikeh\PagerDuty\Provider\Repository\OnCalls as OnCallsProvider;
use Shrikeh\PagerDuty\Repository\OnCalls\OnCallsRepository;

final class OnCalls implements OnCallsProvider, ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container[OnCallsProvider::PROVIDER_REPOSITORY_ONCALLS] = function(Container $c) {
            return new OnCallsRepository(
                $c[Client::PROVIDER_CLIENT],
                new OnCallParser($c[Decoder::PROVIDER_DECODER])
            );
        };
    }
}
