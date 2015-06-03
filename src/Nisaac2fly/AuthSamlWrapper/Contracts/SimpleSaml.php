<?php namespace Nisaac2fly\AuthSamlWrapper\Contracts;

interface SimpleSaml {

    /**
     * @return bool
     */
    public function isAuthenticated();

    /**
     * @param array $params
     * @return mixed
     */
    public function requireAuth(array $params = array());

    /**
     * @param array $params
     * @return mixed
     */
    public function login(array $params = array());

    /**
     * @param null $params
     * @return mixed
     */
    public function logout($params = null);

    /**
     * @return mixed
     */
    public function getAttributes();

    /**
     * @param $name
     * @return mixed
     */
    public function getAuthData($name);

    /**
     * @param null $returnTo
     * @return mixed
     */
    public function getLoginURL($returnTo = null);

    /**
     * @param null $returnTo
     * @return mixed
     */
    public function getLogoutURL($returnTo = null);
}