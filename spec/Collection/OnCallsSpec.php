<?php

namespace spec\Shrikeh\PagerDuty\Collection;

use Shrikeh\PagerDuty\Collection\OnCalls;
use Shrikeh\PagerDuty\Entity\OnCall;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnCallsSpec extends ObjectBehavior
{
    function let(
        OnCall $entry1,
        OnCall $entry2,
        OnCall $entry3
    ) {
        $entry1->level()->willReturn(1);
        $entry2->level()->willReturn(2);
        $entry3->level()->willReturn(3);
        $this->beConstructedWith([$entry1, $entry2, $entry3]);
    }

    function it_is_seekable(
        $entry1,
        $entry2,
        $entry3
    ) {
        $this->seek(2)->shouldReturn($entry2);
    }

    function it_throws_an_exception_if_you_seek_a_level_it_doesnt_have(
        $entry1,
        $entry2,
        $entry3
    ) {
        $this->shouldThrow('\OutOfBoundsException')->duringSeek(4);
    }

    function it_throws_an_exception_if_you_try_to_set_an_oncall(
        $entry2
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetSet($entry2, 'foo');
    }

    function it_throws_an_exception_if_you_try_to_unset_an_oncall(
        $entry1
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetUnset($entry1);
    }
}
