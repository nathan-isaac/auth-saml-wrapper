# Authentication Wrapper For SimpleSaml and OneLogin

[![Build Status](https://travis-ci.org/nisaac2fly/auth-saml-wrapper.svg?branch=master)](https://travis-ci.org/nisaac2fly/auth-saml-wrapper)

This package is currently under development...

## Non-Laravel Usage

```php
use Nisaac2fly\AuthSamlWrapper\SimpleSamlServiceProvider;

$path = __DIR__ . '/../path/to/saml/lib/_autoload.php';

$source = 'default-sp';

$auth = new SimpleSamlServiceProvider($path, $source);

$auth->register();

$saml = $auth->saml();

```

## Laravel Usage

More to come...

```php
// app/config/app.php
'providers' => [
    '...',
    'Nisaac2fly\AuthSamlWrapper\AuthSamlWrapperServiceProvider'
];
```

## Attribute Sanitizer

```php
$sanitizer = new AttributeSanitizer($saml->attributes());

$sanitizer->setDates([
    'whencreated' => 'zulu',
    'lastlogon' => '18bit',
]);

$sanitizer->seTypes([
    'email' => 'string',
    'groups' => 'array'
]);

$attributes = $sanitizer->make();
```