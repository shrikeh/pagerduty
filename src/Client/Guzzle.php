<?php

namespace Shrikeh\PagerDuty\Client;

use GuzzleHttp\ClientInterface;

class Guzzle
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function request($method, $action, $options = [])
    {
        return $this->client->request($method, $action, $options);
    }
}
