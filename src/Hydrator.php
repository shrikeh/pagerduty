<?php

namespace Shrikeh\PagerDuty;

use Psr\Http\Message\ResponseInterface as Response;

interface Hydrator
{

    public function hydrate(Response $response);

}
