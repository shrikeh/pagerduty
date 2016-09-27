<?php

namespace spec\Shrikeh\PagerDuty\Repository\OnCalls;

use Shrikeh\PagerDuty\Client;
use Shrikeh\PagerDuty\Repository\OnCalls\OnCallRepository;
use Shrikeh\PagerDuty\Collection\EscalationPolicyCollection;

use Psr\Http\Message\ResponseInterface;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnCallRepositorySpec extends ObjectBehavior
{
    function it_returns_a_collection_of_who_is_on_call(
        Client $client,
        ResponseInterface $response
    ) {
        $client->request('GET', OnCallRepository::ENDPOINT)->willReturn($response);
        $response->getBody()->shouldBeCalled();
        $this->beConstructedWith($client);
        $this->get()->shouldHaveType('Shrikeh\PagerDuty\Collection\EscalationPolicyCollection');
    }
}
