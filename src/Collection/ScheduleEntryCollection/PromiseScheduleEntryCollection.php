<?php

namespace Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;

use GuzzleHttp\Promise\PromiseInterface as Promise;
use Shrikeh\PagerDuty\Collection\ScheduleEntryCollection;

class PromiseScheduleEntryCollection implements ScheduleEntryCollection
{
    private $promise;

    private $data;

    public function __construct(Promise $promise)
    {
        $this->promise = $promise;
    }

    public function valid()
    {
        $this->hydrate();
    }

    public function key()
    {
        $this->hydrate();
    }

    public function current()
    {
        $this->hydrate();
    }

    public function rewind()
    {
        $this->hydrate();
    }

    public function next()
    {
        $this->hydrate();
    }

    public function offsetSet($offset, $value)
    {
        $this->hydrate();
    }

    public function offsetGet($offset)
    {
        $this->hydrate();
    }

    public function offsetExists($offset)
    {
        $this->hydrate();
    }

    public function offsetUnset($offset)
    {
        $this->hydrate();
    }

    private function hydrate()
    {
        if (!isset($this->data)) {
            $data = new SplObjectStorage();
            $this->promise->then(function ($response) use ($data) {
                $result = json_decode($response->getBody());
                foreach ($result->entries as $entry) {
                  
                }
            });
        }

    }
}
