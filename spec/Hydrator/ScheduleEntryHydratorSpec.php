<?php

namespace spec\Shrikeh\PagerDuty\Hydrator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Psr\Http\Message\ResponseInterface as Response;
use Shrikeh\PagerDuty\Decoder;
use Webmozart\Json\JsonDecoder;

class ScheduleEntryHydratorSpec extends ObjectBehavior
{
    private function getValidJson()
    {
      $decoder = new JsonDecoder();
      return $decoder->decodeFile('spec/fixtures/schedule-entry.json');
    }

    function let(Decoder $decoder)
    {
        $this->beConstructedWith($decoder);
    }

    function it_decodes_the_body_of_the_response(
        $decoder,
        Response $response
    ) {
        $string = 'foo';
        $response->getBody()->shouldBeCalled()->willReturn($string);
        $decoder->decode($string)->shouldBeCalled()->willReturn($this->getValidJson());
        $this->hydrate($response)->shouldBeAnInstanceOf('Shrikeh\PagerDuty\Collection\ScheduleEntryCollection\ScheduleEntryCollection');
    }
}
