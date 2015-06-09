<?php

namespace Nisaac2fly\AuthSamlWrapper\Helpers;

class AttributeSanitizer
{
    /**
     * Attributes
     *
     * @var array
     */
    private $attributes;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return array
     */
    public function make()
    {
        $sanitized = [];

        foreach($this->attributes as $key => $value)
        {
            if ($this->isSingleValue($value))
            {
                $sanitized[$key] = $value[0];
            }
            else
            {
                $sanitized[$key] = $value;
            }
        }

        return $sanitized;
    }

    /**
     * @param $value
     * @return bool
     */
    private function isSingleValue($value)
    {
        return ! isset($value[1]) AND isset($value[0]);
    }
}
