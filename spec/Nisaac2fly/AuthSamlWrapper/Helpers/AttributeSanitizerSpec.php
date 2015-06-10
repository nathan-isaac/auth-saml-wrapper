<?php

namespace spec\Nisaac2fly\AuthSamlWrapper\Helpers;

use Carbon\Carbon;
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
            ],
            'whencreated' => ['20150610153540.0Z'],
            'lockouttime' => ['130784241400000000']
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
            ],
            'whencreated' => '20150610153540.0Z',
            'lockouttime' => '130784241400000000'
        ];

        $this->make()->shouldReturn($attributes);
    }

    function it_sanitizes_active_directory_dates()
    {
        $attributes = [
            'displayname' => 'Tony Stark',
            'email' => 'Tony.Stark@email.com',
            'groups' => [
                'jarvis',
                'iron_man',
                'computer'
            ],
            'whencreated' => Carbon::createFromTimestamp('1433950540'),
            'lockouttime' => Carbon::createFromTimestamp('1433950540')
        ];

        $this->setDates([
            'whencreated' => 'zulu',
            'lockouttime' => '18bit',
            'pwdlastset' => '18bit',
            'accountexpires' => '18bit',
            'lastlogon' => '18bit',
            'lastlogontimestamp' => '18bit',
        ]);

        $this->make()->shouldBeLike($attributes);
    }

    function it_forces_attribute_types()
    {
        $attributes = [
            'email' => ['Tony.Stark@email.com'],
            'groups' => [
                'jarvis',
            ],
        ];

        $this->beConstructedWith($attributes);

        $this->setTypes([
            'email' => 'string',
            'groups' => 'array'
        ]);

        $this->make()->shouldReturn([
            'email' => 'Tony.Stark@email.com',
            'groups' => ['jarvis'],
        ]);
    }
}
