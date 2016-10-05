<?php

namespace Shrikeh\PagerDuty\Hydrator;

use stdClass;
use GuzzleHttp\Psr7\Uri;
use Shrikeh\PagerDuty\Collection\ContactMethods;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Hydrator\ContactMethod as ContactMethodHydrator;
use Shrikeh\PagerDuty\Entity\User\User as UserEntity;

final class User implements Hydrator
{
    public function __construct(ContactMethodHydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    public function hydrate(stdClass $dto)
    {
        return UserEntity::fromData(
            new ContactMethods(array_map($this->hydrator(), $dto->contact_methods)),
            new Uri($dto->self),
            $dto->name,
            $dto->email,
            $dto->summary
        );
    }

    public function supports($token)
    {
        return ('user' === $token);
    }

    private function hydrator()
    {
        return $this->hydrator;
    }
}
