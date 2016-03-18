<?php

namespace Shrikeh\PagerDuty\PromiseCallback;

use Psr\Http\Message\ResponseInterface;

interface FulfilledCallback
{
    public function __invoke(ResponseInterface $res);
}
