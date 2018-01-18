<?php
/**
 * TM4B SMS Client for PHP
 *
 * @copyright Copyright (c) 2018 TM4B Ltd. (https://tm4b.com)
 * @license   https://github.com/tm4b/tm4b-php/blob/master/LICENSE MIT License
 */

namespace Tm4b\Hydrator;

use Webmozart\Assert\Assert;

/**
 * Class ObjectHydrator
 * @package Tm4b\Rest\Hydrator
 */
class ObjectHydrator implements HydrationInterface
{
    /**
     * @param array $data
     * @param $object
     * @return mixed
     */
    public function hydrate(array $data, $object)
    {
        Assert::object($object);

        foreach ($data as $key => $value) {
            $property = $this->underscoreToCamelCase($key);
            $methodName = sprintf("set%s", ucfirst($property));
            if (method_exists($object, $methodName)) {
                $this->{$methodName}($value);
            }
        }

        return $object;
    }

    /**
     * @param $string
     * @return mixed
     */
    protected function underscoreToCamelCase($string)
    {
        return str_replace('_', '', ucwords($string, '_'));
    }
}