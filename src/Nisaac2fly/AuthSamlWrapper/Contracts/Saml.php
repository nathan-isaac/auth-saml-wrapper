<?php namespace Nisaac2fly\AuthSamlWrapper\Contracts;

interface Saml {

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check();

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest();

    /**
     * @return array|null
     */
    public function attributes();

    /**
     * @return array|null
     */
    public function authAttributes();

    /**
     * Require user to be logged in before continuing.
     *
     * @param array $params
     */
    public function requireAuth(array $params = []);

    /**
     * Log a user into the application.
     *
     * @param array $params
     */
    public function login(array $params = []);

    /**
     * @param null $returnTo
     * @return mixed
     */
    public function loginUrl($returnTo = null);

    /**
     * Log the user out of the application.
     *
     * @param mixed $params
     */
    public function logout($params = null);

    /**
     * @param null $returnTo
     * @return mixed
     */
    public function logoutUrl($returnTo = null);

}