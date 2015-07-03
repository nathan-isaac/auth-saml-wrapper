<?php

namespace spec\Nisaac2fly\AuthSamlWrapper\SimpleSaml;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SimpleSamlServiceProviderSpec extends ObjectBehavior
{
    function let()
    {
        $path = __DIR__ . '/../../../stubs/SimpleSAML_Auth_Simple.php';

        $this->beConstructedWith($path);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Nisaac2fly\AuthSamlWrapper\SimpleSaml\SimpleSamlServiceProvider');
    }

    function it_registers_saml()
    {
        $this->register();

        $this->saml()->shouldBeAnInstanceOf('Nisaac2fly\AuthSamlWrapper\SimpleSaml\Guard');
    }
}

