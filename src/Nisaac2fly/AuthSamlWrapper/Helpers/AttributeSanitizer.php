<?php

namespace Nisaac2fly\AuthSamlWrapper\Helpers;

use Carbon\Carbon;

class AttributeSanitizer
{
    /**
     * @var array
     */
    private $sanitized = [];

    /**
     * Attributes
     *
     * @var array
     */
    private $attributes = [];

    /**
     * Dates array
     *
     * @var array
     */
    private $dates = [];

    /**
     * Attribute data types
     *
     * @var array
     */
    private $types = [];

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
        foreach($this->attributes as $key => $value)
        {
            $this->sanitized[$key] = $this->sanitize($key, $value);
        }

        return $this->sanitized;
    }

    /**
     * @param $dates
     */
    public function setDates($dates)
    {
        $this->dates = $dates;
    }

    /**
     * @param $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }

    /**
     * @param $key
     * @param $value
     * @return AttributeSanitizer|null|string
     */
    private function sanitize($key, $value)
    {
        if ( ! $this->isTypeArray($key)
            AND ($this->isTypeString($key, $value)
                OR $this->isSingleValue($value)) )
        {
            $value = $value[0];
        }

        $value = $this->sanitizeDate($key, $value);

        return $value;
    }

    /**
     * Create Carbon date instances
     *
     * @param $key
     * @param $value
     * @return AttributeSanitizer|null|string
     */
    private function sanitizeDate($key, $value)
    {
        foreach($this->dates as $name => $type)
        {
            if($key == $name AND $type == 'zulu')
                return $this->createCarbonDateFromZuluTimeStamp($value);
            elseif($key == $name AND $type == '18bit' AND $this->isSpecialTimeStamp($value))
                return null;
            elseif($key == $name AND $type == '18bit')
                return $this->createCarbonDateFromAdTimeStamp($value);
        }

        return $value;
    }

    /**
     * Create carbon instance from zulu timestamp
     *
     * @param $value
     * @return static
     */
    private function createCarbonDateFromZuluTimeStamp($value)
    {
        return Carbon::createFromFormat('YmdHis', substr($value, 0, -3), 'UTC');
    }

    /**
     * Create carbon instance from ad timestamp
     *
     * @param $value
     * @return string
     */
    private function createCarbonDateFromAdTimeStamp($value)
    {
        $winSecs = (int)($value / 10000000); // divide by 10 000 000 to get seconds
        $unixTimestamp = ($winSecs - 11644473600); // 1.1.1600 -> 1.1.1970 difference in seconds

        return Carbon::createFromTimestamp($unixTimestamp);
    }

    /**
     * @param $value
     * @return bool
     */
    private function isSingleValue($value)
    {
        return ! isset($value[1]) AND isset($value[0]);
    }

    /**
     * Check if timestamp is a special case.
     *
     * Example would be never expired account
     * and not a locked account.
     *
     * @param $value
     * @return bool
     */
    private function isSpecialTimeStamp($value)
    {
        return $value == '9223372036854775807' OR $value == '0';
    }

    /**
     * @param $key
     * @return bool
     */
    private function isDate($key)
    {
        return isset($this->dates[$key]);
    }

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    private function isTypeString($key, $value)
    {
        return isset($this->types[$key]) AND $this->types[$key] == 'string' AND $this->isSingleValue($value);
    }

    /**
     * @param $key
     * @return bool
     */
    private function isTypeArray($key)
    {
        return isset($this->types[$key]) AND $this->types[$key] == 'array';
    }
}
