<?php

namespace Shrikeh\PagerDuty;

interface Decoder
{
    public function __invoke($payload);

    public function decode($payload);
}
