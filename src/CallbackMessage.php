<?php

namespace Shrikeh\PagerDuty;

class CallbackMessage
{
    private $message;

    public function set($message)
    {
        $this->message = $message;
    }

    public function get()
    {
        return $this->message;
    }
}
