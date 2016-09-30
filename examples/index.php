<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Shrikeh\PagerDuty\Application\Provider\Client\Guzzle;
use Shrikeh\PagerDuty\Application\Provider\Http\Api;
use Shrikeh\PagerDuty\Application\Provider\Decoder\Json;
use Shrikeh\PagerDuty\Application\Provider\Auth\Http;
use Shrikeh\PagerDuty\Application\Provider\Repository\OnCalls\OnCalls;

$container = new Pimple\Container();

$container->register(new Guzzle());
$container->register(new Json());
$container->register(new Http());
$container->register(new Api());
$container->register(new OnCalls());

$container[Api::PROVIDER_HTTP_DOMAIN] = 'api.pagerduty.com';
$container[Http::PROVIDER_AUTH_TOKEN] = 'w_8PcNuhHa-y3xYdmc1x';

$oncalls = $container[OnCalls::PROVIDER_REPOSITORY_ONCALLS]->get();


foreach ($oncalls as $onCall) {
    var_dump($onCall);
}
