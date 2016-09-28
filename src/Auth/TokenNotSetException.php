<?php

namespace Shrikeh\PagerDuty\Auth;

use DomainException;
use Shrikeh\PagerDuty\Exception\VariableNotSet;

class TokenNotSetException extends DomainException implements VariableNotSet
{

}
