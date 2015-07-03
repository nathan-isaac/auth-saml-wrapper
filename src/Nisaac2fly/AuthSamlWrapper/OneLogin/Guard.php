<?php namespace Nisaac2fly\AuthSamlWrapper\OneLogin;

use Nisaac2fly\AuthSamlWrapper\Contracts\Saml;

class Guard implements Saml {

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
        // TODO: Implement guest() method.
    }

    /**
     * @return array|null
     */
    public function attributes()
    {
        // TODO: Implement attributes() method.
    }

    /**
     * @param string $name
     *
     * @return array|null
     */
    public function authData($name)
    {
        // TODO: Implement authData() method.
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