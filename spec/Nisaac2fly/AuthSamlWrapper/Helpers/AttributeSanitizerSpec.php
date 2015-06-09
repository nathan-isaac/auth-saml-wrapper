<?php

namespace spec\Nisaac2fly\AuthSamlWrapper\Helpers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AttributeSanitizerSpec extends ObjectBehavior
{
    function let()
    {
        $attributes = [
            'displayname' => ['Tony Stark'],
            'email' => ['Tony.Stark@email.com'],
            'groups' => [
                'jarvis',
                'iron_man',
                'computer'
            ]
        ];

        $this->beConstructedWith($attributes);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Nisaac2fly\AuthSamlWrapper\Helpers\AttributeSanitizer');
    }

    function it_simplifies_attribute_array()
    {
        $attributes = [
            'displayname' => 'Tony Stark',
            'email' => 'Tony.Stark@email.com',
            'groups' => [
                'jarvis',
                'iron_man',
                'computer'
            ]
        ];

        $this->make()->shouldReturn($attributes);
    }
}
