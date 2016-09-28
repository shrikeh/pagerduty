<?php

namespace Shrikeh\PagerDuty\Auth\TokenNotSet;

use Shrikeh\PagerDuty\Application\Invokable;
use Shrikeh\PagerDuty\ThrowHandler as ThrowHandlerInterface;
use Shrikeh\PagerDuty\Auth\TokenNotSetException;

final class ThrowHandler implements ThrowHandlerInterface, Invokable
{
    use \Shrikeh\PagerDuty\Application\VariableNotSet;

    public function throw()
    {
      throw new TokenNotSetException(
          $this->msg,
          $this->errorCode
      );
    }
}
