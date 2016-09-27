<?php

namespace Shrikeh\PagerDuty\Repository\OnCalls;

use Shrikeh\PagerDuty\Client;
use Shrikeh\PagerDuty\Repository\OnCalls;
use Shrikeh\PagerDuty\Collection\EscalationPolicyCollection;

class OnCallRepository implements OnCalls
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get()
    {
        $response = $this->client->request('GET', static::ENDPOINT);
        $response->getBody();
        return new EscalationPolicyCollection();
    }
}
