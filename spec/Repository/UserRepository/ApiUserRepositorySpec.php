<?php

namespace spec\Shrikeh\PagerDuty\Repository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiUserRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Shrikeh\PagerDuty\Repository\ApiUserRepository');
    }

    // function it_should_return_a_user_collection(
    //     HttpClient $client,
    //     RequestBuilder $requestBuilder,
    //     EmailAddress $email,
    //     UserCollection $users
    // )
    // {
    //     $this->beConstructedWith($client, $requestBuilder);
    //     $requestBuilder->request()->willReturn($request);
    //     $client->sendAsync()->willReturn($promise);
    //     $this->fetchByEmail($email)->shouldReturn($users);
    // }
}
