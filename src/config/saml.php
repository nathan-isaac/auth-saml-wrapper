<?php

return [

    /**
     * Select which saml package to use
     */
    'package' => 'simplesaml',

    /**
     * Supported saml packages
     */
    'simplesaml' => [

        /**
         * Path to SIMPLE SAML PHP autoload file.
         *
         * Example: '/../../../simple-saml/lib/_autoload.php'
         */
        'autoload' => env('SIMPLESAML_AUTOLOAD'),

        /**
         * Simple Saml Authentication Source
         *
         * Example: default-sp
         */
        'source' => env('SIMPLESAML_SOURCE', 'default-sp'),
    ]

];