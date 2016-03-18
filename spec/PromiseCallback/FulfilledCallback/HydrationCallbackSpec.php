<?php

namespace spec\Shrikeh\PagerDuty\PromiseCallback\FulfilledCallback;

use Shrikeh\PagerDuty\CallbackMessage;
use Shrikeh\PagerDuty\Hydrator;
use Psr\Http\Message\ResponseInterface;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HydrationCallbackSpec extends ObjectBehavior
{
    public function let(
      Hydrator $hydrator,
      CallbackMessage $message
    ) {
        $this->beConstructedWith($hydrator, $message);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\PromiseCallback\FulfilledCallback');
    }

    function it_hydrates_from_a_response(
        $hydrator,
        $message,
        ResponseInterface $response
    )
    {
        $data = 'foo';
        $hydrator->hydrate($response)->willReturn($data);
        $message->set($data)->shouldBeCalled();
        $this($response);
    }
}
