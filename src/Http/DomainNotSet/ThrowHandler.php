<?php

namespace Shrikeh\PagerDuty\Http\DomainNotSet;

use Shrikeh\PagerDuty\Application\Invokable;
use Shrikeh\PagerDuty\ThrowHandler as ThrowHandlerInterface;
use Shrikeh\PagerDuty\Http\DomainNotSetException;

final class ThrowHandler implements Invokable, ThrowHandlerInterface
{
  use \Shrikeh\PagerDuty\Application\VariableNotSet;

  public function throw()
  {
    throw new DomainNotSetException(
        $this->msg,
        $this->errorCode
    );
  }
}
