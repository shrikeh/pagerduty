<?php

namespace Shrikeh\PagerDuty\Http;

use DomainException;
use Shrikeh\PagerDuty\Exception\VariableNotSet;

class DomainNotSetException extends DomainException implements VariableNotSet
{

}
