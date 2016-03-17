<?php

namespace Shrikeh\PagerDuty\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Hydrator\ScheduleEntryHydrator;

class ScheduleEntry implements ServiceProviderInterface
{
  public function register(Container $container)
  {
    $container['scheduleEntryHydrator'] = function($c) {
        return new ScheduleEntryHydrator($c['decoder']);
    };
  }
}
