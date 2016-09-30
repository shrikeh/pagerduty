<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Shrikeh\PagerDuty\Provider\Client\Guzzle;
use Shrikeh\PagerDuty\Provider\Http\Api;
use Shrikeh\PagerDuty\Provider\Decoder\Json;
use Shrikeh\PagerDuty\Provider\Auth\Http;
use Shrikeh\PagerDuty\Provider\Repository\OnCalls\OnCalls;

$container = new Pimple\Container();

$container->register(new Guzzle());
$container->register(new Json());
$container->register(new Http());
$container->register(new Api());
$container->register(new OnCalls());

$container[Api::PROVIDER_HTTP_DOMAIN] = 'api.pagerduty.com';
$container[Http::PROVIDER_AUTH_TOKEN] = 'w_8PcNuhHa-y3xYdmc1x';

$oncalls = $container[OnCalls::PROVIDER_REPOSITORY_ONCALLS];
var_dump($oncalls->get());
