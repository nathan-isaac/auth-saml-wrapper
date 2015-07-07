<?php

namespace Nisaac2fly\AuthSamlWrapper\Laravel;

use Exception;

class Attributes {

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @param array $attributes
     * @param User $user
     */
    function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Retrieve the given attribute.
     *
     * @param  string $key
     * @return string
     */
    public function get($key)
    {
        return array_get($this->attributes, $key);
    }

    /**
     * Determine if the given attribute exists.
     *
     * @param  string $key
     * @return boolean
     */
    public function has($key)
    {
        return array_key_exists($key, $this->attributes);
    }

    /**
     * Retrieve an array of all attributes.
     *
     * @return array
     */
    public function all()
    {
        return $this->attributes;
    }

    /**
     * Magic property access for attributes.
     *
     * @param  string $key
     * @return string
     * @throws Exception
     */
    public function __get($key)
    {
        return $this->get($key);
    }
}