<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pimple\Container;

use Shrikeh\PagerDuty\Provider\Decoder as DecoderProvider;
use Shrikeh\PagerDuty\Provider\ScheduleEntry as ScheduleEntryProvider;
use Shrikeh\PagerDuty\Provider\GuzzleHttp as GuzzleHttpProvider;

use Shrikeh\PagerDuty\CallbackBuilder;

$container = new Container();

$container->register(new DecoderProvider());
$container->register(new ScheduleEntryProvider());
$container->register(new GuzzleHttpProvider());

$container['callbackBuilder'] = function($c) {
    return new CallbackBuilder();
};

$container['storage'] = $container->factory(function($c) {
    return new SplObjectStorage();
});

$container['baseUri'] = 'inviqa.pagerduty.com';
$container['headers'] = [
    'Authorization' => "Token token=012010210201",
];

$container['apiScheduleRepository'] = function($c) {

};

$hydrationCallback = $container['callbackBuilder']->hydrationCallback(
    $container['scheduleEntryHydrator'],
    $container['storage']
);
