# Authentication Wrapper For SimpleSaml and OneLogin

[![Build Status](https://travis-ci.org/nisaac2fly/auth-saml-wrapper.svg?branch=master)](https://travis-ci.org/nisaac2fly/auth-saml-wrapper)

This package is currently under development...

## How to install in a non-laravel project

```php
use Nisaac2fly\AuthSamlWrapper\SimpleSamlServiceProvider;

$path = __DIR__ . '/../path/to/saml/lib/_autoload.php';

$source = 'default-sp';

$auth = new SimpleSamlServiceProvider($path, $source);

$auth->register();

$saml = $auth->saml();
```