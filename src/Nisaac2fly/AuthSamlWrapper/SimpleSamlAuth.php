<?php namespace Nisaac2fly\AuthSamlWrapper;

use Nisaac2fly\AuthSamlWrapper\Contracts\SimpleSaml;
use SimpleSAML_Auth_Simple;

class SimpleSamlAuth extends SimpleSAML_Auth_Simple implements SimpleSaml {}