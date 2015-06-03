<?php namespace Nisaac2fly\AuthSamlWrapper;

use Nisaac2fly\AuthSamlWrapper\Contracts\Saml;
use SimpleSAML_Auth_Simple;

class SimpleSaml implements Saml {

    /**
     * @var SimpleSAML_Auth_Simple
     */
    protected $saml;

    /**
     * @param SimpleSAML_Auth_Simple $saml
     */
    public function __construct(SimpleSAML_Auth_Simple $saml)
    {
        $this->saml = $saml;
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        return $this->saml->isAuthenticated();
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        return ! $this->check();
    }

    /**
     * @return array|null
     */
    public function attributes()
    {
        return $this->saml->getAttributes();
    }

    /**
     * @return mixed
     */
    public function authAttributes()
    {
        return $this->saml->getAuthData();
    }

    /**
     * Require user to be logged in before continuing.
     *
     * @param array $params
     */
    public function requireAuth(array $params = [])
    {
        $this->saml->requireAuth($params);
    }

    /**
     * Log a user into the application.
     *
     * @param array $params
     */
    public function login(array $params = [])
    {
        $this->saml->login($params);
    }

    /**
     * @param null $returnTo
     * @return mixed
     */
    public function loginUrl($returnTo = null)
    {
        return $this->saml->getLoginURL($returnTo);
    }

    /**
     * Log the user out of the application.
     *
     * @param mixed $params
     */
    public function logout($params = null)
    {
        $this->saml->logout($params);
    }

    /**
     * @param null $returnTo
     * @return mixed
     */
    public function logoutUrl($returnTo = null)
    {
        return $this->saml->getLogoutURL($returnTo);
    }
}