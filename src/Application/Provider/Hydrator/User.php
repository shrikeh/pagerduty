<?php
namespace Shrikeh\PagerDuty\Application\Provider\Hydrator;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Application\Provider\Hydrator\ContactMethod;

use Shrikeh\PagerDuty\Hydrator\User as Userydrator;

final class User implements ServiceProviderInterface
{
    const PROVIDER_HYDRATOR_USER = 'pagerduty.hydrator.user';

    public function register(Container $container)
    {
        $container = $this->addResourceProviders($container);

        $container[static::PROVIDER_HYDRATOR_USER] = function(Container $c) {
          return new Userydrator(
            $c[ContactMethod::PROVIDER_HYDRATOR_CONTACTMETHOD]
          );
        };
    }

    private function addResourceProviders(Container $container)
    {
        if (!$container->offsetExists(ContactMethod::PROVIDER_HYDRATOR_CONTACTMETHOD)) {
            $container->register(new ContactMethod());
        }
        return $container;
    }
}
