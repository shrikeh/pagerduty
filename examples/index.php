<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Shrikeh\PagerDuty\Provider\Http\Api;

$container = new Pimple\Container();

$container->register(new Shrikeh\PagerDuty\Provider\Client\Guzzle());

$container->register(new Api());

$container[Api::PROVIDER_HTTP_DOMAIN] = 'shrikeh.pagerduty.com';

var_dump($container[Api::PROVIDER_HTTP_DOMAIN]);
