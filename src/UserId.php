<?php

namespace Shrikeh\PagerDuty;

class UserId
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->id;
    }

}
