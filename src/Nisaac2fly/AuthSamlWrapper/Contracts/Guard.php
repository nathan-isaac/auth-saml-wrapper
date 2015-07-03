<?php namespace Nisaac2fly\AuthSamlWrapper\Contracts;

interface Guard {

    /**
     * @return bool
     */
    public function check();

    /**
     * @return bool
     */
    public function guest();

    /**
     * @param Saml $saml
     * @return mixed
     */
    public function login(Saml $saml);

    /**
     * @return mixed
     */
    public function logout();

    /**
     * @return Authenticatable
     */
    public function user();

}