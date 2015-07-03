<?php namespace Nisaac2fly\AuthSamlWrapper\SimpleSaml;

use Exception;
use SimpleSAML_Auth_Simple;

class SimpleSamlServiceProvider {

    /**
     * Simple Saml Autoload file
     *
     * @var string
     */
    protected $autoload;

    /**
     * Simple Saml Source
     *
     * @var string
     */
    protected $source;

    /**
     * @var SimpleSaml
     */
    protected $saml;

    /**
     * @param $autoload
     * @param string $source
     * @param string $package
     */
    function __construct($autoload, $source = 'default-sp')
    {
        $this->autoload = $autoload;
        $this->source = $source;
    }

    /**
     * @throws Exception
     */
    public function register()
    {
        if ( ! file_exists($this->autoload))
        {
            throw new Exception('Simple Saml autoload file could not be found.');
        }

        require_once $this->autoload;

        $auth = new SimpleSAML_Auth_Simple($this->source);

        $this->saml = new Guard($auth);
    }

    /**
     * @return SimpleSaml
     */
    public function saml()
    {
        return $this->saml;
    }

}