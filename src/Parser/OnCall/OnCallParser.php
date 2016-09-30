<?php

namespace Shrikeh\PagerDuty\Parser\OnCall;

use Psr\Http\Message\ResponseInterface;

use Shrikeh\PagerDuty\EscalationPolicy\OnCall as EscalationPolicy;
use Shrikeh\PagerDuty\Collection\EscalationPolicyCollection;
use Shrikeh\PagerDuty\Decoder\Json;
use Shrikeh\PagerDuty\Parser\OnCall;



final class OnCallParser implements OnCall
{
    private $decoder;

    public function __construct(Json $decoder)
    {
        $this->decoder = $decoder;
    }

    public function parseResponse(ResponseInterface $response)
    {
        $dto = $this->decoder->decode($response->getBody());
        $policies = [];
        foreach ($dto->oncalls as $entry) {
            foreach ($entry->escalation_policy as $scalationPolicy) {
                $policies[] = new EscalationPolicy();
            }
        }
        return new EscalationPolicyCollection($policies);
    }
}
