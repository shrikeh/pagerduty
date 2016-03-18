<?php

namespace Shrikeh\PagerDuty\PromiseCallback\FulfilledCallback;

use Shrikeh\PagerDuty\CallbackMessage;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\PromiseCallback\FulfilledCallback;
use Psr\Http\Message\ResponseInterface;

class HydrationCallback implements FulfilledCallback
{
    private $hydrator;
    private $message;

    public function __construct(
        Hydrator $hydrator,
        CallbackMessage $message
    ) {
        $this->hydrator = $hydrator;
        $this->message = $message;
    }

    public function __invoke(ResponseInterface $res)
    {
        $this->message->set($this->hydrator->hydrate($res));
    }
}
