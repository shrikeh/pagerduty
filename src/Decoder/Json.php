<?php

namespace Shrikeh\PagerDuty\Decoder;

use Shrikeh\PagerDuty\Decoder;
use Webmozart\Json\JsonDecoder;

class Json implements Decoder
{
    private $decoder;

    public function __construct()
    {
        $this->decoder = new JsonDecoder();
    }

    public function __invoke($payload)
    {
        return $this->decode($payload);
    }

    public function decode($payload)
    {
        return $this->decoder->decode($payload);
    }
}
