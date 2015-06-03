<?php

namespace spec\Nisaac2fly\AuthSamlWrapper;

use Nisaac2fly\AuthSamlWrapper\Contracts\SimpleSaml;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SimpleSamlSpec extends ObjectBehavior
{
    function let(SimpleSaml $saml)
    {
        $this->beConstructedWith($saml);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Nisaac2fly\AuthSamlWrapper\SimpleSaml');
    }

    function it_should_check_if_user_is_authenticated(SimpleSaml $saml)
    {
        $saml->isAuthenticated()->willReturn(true);

        $this->check()->shouldReturn(true);
    }

    function it_should_check_if_user_is_not_authenticated(SimpleSaml $saml)
    {
        $saml->isAuthenticated()->willReturn(false);

        $this->guest()->shouldReturn(true);
    }

    function it_should_return_user_attributes(SimpleSaml $saml)
    {
        $attributes = ['id' => 'some cool id'];

        $saml->getAttributes()->willReturn($attributes);

        $this->attributes()->shouldReturn($attributes);
    }

    function it_should_return_user_auth_attributes(SimpleSaml $saml)
    {
        $attributes = ['auth' => 'attribute'];

        $saml->getAuthData(Argument::any())->willReturn($attributes);

        $this->authData(Argument::any())->shouldReturn($attributes);
    }

    function it_should_require_authentication(SimpleSaml $saml)
    {
        $saml->requireAuth(Argument::any())->shouldBeCalled();

        $this->requireAuth();
    }

    function it_should_login(SimpleSaml $saml)
    {
        $saml->login(Argument::any())->shouldBeCalled();

        $this->login();
    }

    function it_should_get_the_login_url(SimpleSaml $saml)
    {
        $saml->getLoginURL(Argument::any())->shouldBeCalled();

        $this->loginUrl();
    }

    function it_should_logout(SimpleSaml $saml)
    {
        $saml->logout(Argument::any())->shouldBeCalled();

        $this->logout();
    }

    function it_should_get_the_logout_url(SimpleSaml $saml)
    {
        $saml->getLogoutURL(Argument::any())->shouldBeCalled();

        $this->logoutUrl();
    }
}
