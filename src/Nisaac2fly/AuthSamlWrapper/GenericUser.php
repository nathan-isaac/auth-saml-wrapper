<?php namespace Nisaac2fly\AuthSamlWrapper;

class GenericUser {

	/**
	 * All of the user's attributes.
	 *
	 * @var array
	 */
	protected $attributes;

    /**
     * Create a new generic User object.
     *
     * @param  array $attributes
     */
	public function __construct(array $attributes)
	{
		$this->attributes = $attributes;
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->attributes['id'][0];
	}

	/**
	 * Dynamically access the user's attributes.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function __get($key)
	{
        if (isset($this->attributes[$key][1]))
            return $this->attributes[$key];
        else
            return $this->attributes[$key][0];
	}

	/**
	 * Dynamically set an attribute on the user.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function __set($key, $value)
	{
		$this->attributes[$key] = $value;
	}

	/**
	 * Dynamically check if a value is set on the user.
	 *
	 * @param  string  $key
	 * @return bool
	 */
	public function __isset($key)
	{
		return isset($this->attributes[$key]);
	}

	/**
	 * Dynamically unset a value on the user.
	 *
	 * @param  string  $key
	 * @return void
	 */
	public function __unset($key)
	{
		unset($this->attributes[$key]);
	}

}
