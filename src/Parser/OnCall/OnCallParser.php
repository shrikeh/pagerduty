<?php

namespace Shrikeh\PagerDuty\Parser\OnCall;

use Shrikeh\PagerDuty\Decoder\Json;
use Shrikeh\PagerDuty\Parser\OnCall;
use Psr\Http\Message\ResponseInterface;

final class OnCallParser implements OnCall
{
    private $decoder;

    public function __construct(Json $decoder)
    {
        $this->decoder = $decoder;
    }

    public function parseResponse(ResponseInterface $response)
    {
        return new EscalationPolicyCollection(
            $this->decoder->decode($response->getBody())
      );
    }
}
