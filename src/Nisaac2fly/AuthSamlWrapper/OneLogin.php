<?php namespace Nisaac2fly\AuthSamlWrapper;

use App\Services\Auth\Contracts\Saml;

class OneLogin implements Saml {

    /**
     * @var
     */
    protected $saml;

    /**
     * @param $saml
     */
    public function __construct($saml)
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
        // TODO: Implement check() method.
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
        // TODO: Implement attributes() method.
    }

    /**
     * @return array|null
     */
    public function authAttributes()
    {
        // TODO: Implement authAttributes() method.
    }

    /**
     * Require user to be logged in before continuing.
     *
     * @param array $params
     */
    public function requireAuth(array $params = [])
    {
        // TODO: Implement requireAuth() method.
    }

    /**
     * Log a user into the application.
     *
     * @param array $params
     */
    public function login(array $params = [])
    {
        // TODO: Implement login() method.
    }

    /**
     * @param null $returnTo
     * @return mixed
     */
    public function loginUrl($returnTo = null)
    {
        // TODO: Implement loginUrl() method.
    }

    /**
     * Log the user out of the application.
     *
     * @param mixed $params
     */
    public function logout($params = null)
    {
        // TODO: Implement logout() method.
    }

    /**
     * @param null $returnTo
     * @return mixed
     */
    public function logoutUrl($returnTo = null)
    {
        // TODO: Implement logoutUrl() method.
    }
}