<?php

namespace Shrikeh\PagerDuty\Hydrator;

use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Decoder;
use Shrikeh\PagerDuty\ScheduleEntry as Entry;
use Psr\Http\Message\ResponseInterface as Response;
use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection\ScheduleEntryCollection;

class ScheduleEntryHydrator implements Hydrator
{
    private $decoder;

    public function __construct(Decoder $decoder)
    {
        $this->decoder = $decoder;
    }

    public function hydrate(Response $response)
    {
        $data = $this->decoder->decode($response->getBody());
        $entries = new \ArrayObject();
        foreach ($data->entries as $entry) {
            $entries->append($this->entry($entry));
        }
        return new ScheduleEntryCollection($entries);
    }

    private function entry(\stdClass $entry)
    {
        $start  = $entry->start;
        $end    = $entry->start;
        $user   = $entry->user;

        return Entry::fromRaw($start, $end, $user);
    }

}
