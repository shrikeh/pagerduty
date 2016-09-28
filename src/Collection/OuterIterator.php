<?php

namespace Shrikeh\PagerDuty\Collection;

trait OuterIterator
{
    private $collection;

    public function getInnerIterator()
    {
        return $this->collection;
    }

    public function current()
    {
        return $this->getInnerIterator()->current();
    }

    public function key()
    {
        return $this->getInnerIterator()->key();
    }

    public function next()
    {
        return $this->getInnerIterator()->next();
    }

    public function rewind()
    {
        return $this->getInnerIterator()->rewind();
    }

    public function valid()
    {
        return $this->getInnerIterator()->valid();
    }
}
