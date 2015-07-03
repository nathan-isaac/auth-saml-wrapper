<?php namespace Nisaac2fly\AuthSamlWrapper\laravel;

use Illuminate\Support\Facades\Facade;

class SamlFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Nisaac2fly\AuthSamlWrapper\Contracts\Saml'; }

}