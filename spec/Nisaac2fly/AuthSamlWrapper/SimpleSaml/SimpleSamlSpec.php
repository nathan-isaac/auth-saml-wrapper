<?php

namespace spec\Nisaac2fly\AuthSamlWrapper\SimpleSaml;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SimpleSAML_Auth_Simple;

class GuardSpec extends ObjectBehavior
{
    function let(SimpleSAML_Auth_Simple $saml)
    {
        $this->beConstructedWith($saml);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Nisaac2fly\AuthSamlWrapper\SimpleSaml\Guard');
    }

    function it_should_check_if_user_is_authenticated(SimpleSAML_Auth_Simple $saml)
    {
        $saml->isAuthenticated()->willReturn(true);

        $this->check()->shouldReturn(true);
    }

    function it_should_check_if_user_is_not_authenticated(SimpleSAML_Auth_Simple $saml)
    {
        $saml->isAuthenticated()->willReturn(false);

        $this->guest()->shouldReturn(true);
    }

    function it_should_return_user_attributes(SimpleSAML_Auth_Simple $saml)
    {
        $attributes = ['id' => 'some cool id'];

        $saml->getAttributes()->willReturn($attributes);

        $this->attributes()->shouldReturn($attributes);
    }

    function it_should_return_user_auth_attributes(SimpleSAML_Auth_Simple $saml)
    {
        $attributes = ['auth' => 'attribute'];

        $saml->getAuthData(Argument::any())->willReturn($attributes);

        $this->authData(Argument::any())->shouldReturn($attributes);
    }

    function it_should_require_authentication(SimpleSAML_Auth_Simple $saml)
    {
        $saml->requireAuth(Argument::any())->shouldBeCalled();

        $this->requireAuth();
    }

    function it_should_login(SimpleSAML_Auth_Simple $saml)
    {
        $saml->login(Argument::any())->shouldBeCalled();

        $this->login();
    }

    function it_should_get_the_login_url(SimpleSAML_Auth_Simple $saml)
    {
        $saml->getLoginURL(Argument::any())->shouldBeCalled();

        $this->loginUrl();
    }

    function it_should_logout(SimpleSAML_Auth_Simple $saml)
    {
        $saml->logout(Argument::any())->shouldBeCalled();

        $this->logout();
    }

    function it_should_get_the_logout_url(SimpleSAML_Auth_Simple $saml)
    {
        $saml->getLogoutURL(Argument::any())->shouldBeCalled();

        $this->logoutUrl();
    }
}
