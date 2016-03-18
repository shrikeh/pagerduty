<?php
namespace Shrikeh\PagerDuty;

use \ArrayAccess;
use \Countable;
use \Iterator;

interface Collection extends ArrayAccess, Countable, Iterator
{

}
